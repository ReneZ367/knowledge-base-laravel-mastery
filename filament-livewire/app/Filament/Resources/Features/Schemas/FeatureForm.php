<?php

namespace App\Filament\Resources\Features\Schemas;

use App\Enums\Feature\FeatureStatus;
use App\Enums\FeatureType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Feature')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                Section::make('Overview')
                                    ->columns(3)
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('name')
                                            ->required(),
                                        Select::make('status')
                                            ->options(FeatureStatus::class)
                                            ->enum(FeatureStatus::class)
                                            ->searchable()
                                            ->required()
                                            ->default(FeatureStatus::Proposed),
                                        Slider::make('priority')
                                            ->required()
                                            ->extraFieldWrapperAttributes([
                                                'class' => 'pl-3',
                                            ])
                                            ->minValue(1)
                                            ->maxValue(10)
                                            ->pips(Slider\Enums\PipsMode::Steps)
                                            ->step(1)
                                            ->fillTrack()
                                            ->default(1),
                                        ToggleButtons::make('type')
                                            ->hiddenLabel()
                                            ->options(FeatureType::class)
                                            ->enum(FeatureType::class)
                                            ->inline()
                                            ->required()
                                            ->default(FeatureType::Feature),
                                    ]),
                                Section::make('Timeline')
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([
                                        DatePicker::make('target_delivery_date')
                                            ->rules([
                                                function (Get $get) {
                                                    return Rule::requiredIf($get('status') === FeatureStatus::Planned || $get('status') === FeatureStatus::InProgress);
                                                },
                                            ])
                                            ->visibleJs(self::visibleWhenStatusPlannedOrInProgressJs()),
                                        DateTimePicker::make('delivered_at')
                                            ->visibleJs(self::visibleWhenStatusCompletedJs()),
                                    ]),
                                Section::make('Description')
                                    ->columnSpanFull()
                                    ->schema([
                                        RichEditor::make('description')
                                            ->extraInputAttributes([
                                                'style' => 'min-height: 150px;',
                                            ])
                                            ->toolbarButtons([
                                                ['bold', 'italic', 'underline', 'strike', 'link'],
                                                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                            ])
                                            ->required(),
                                    ]),
                            ]),
                        Tab::make('Effort and Cost')
                            ->schema([
                                Section::make('Estimates')
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('effort_in_days')
                                            ->required()
                                            ->numeric()
                                            ->afterStateUpdatedJs(self::syncCostAfterEffortChangeJs()),
                                        Toggle::make('is_high_cost')
                                            ->label('High cost rate')
                                            ->dehydrated(false)
                                            ->afterStateUpdatedJs(self::syncCostAfterHighCostToggleJs()),
                                        TextInput::make('cost')
                                            ->required()
                                            ->numeric()
                                            ->default(0.0)
                                            ->prefix('$')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    private static function visibleWhenStatusPlannedOrInProgressJs(): string
    {
        return <<<'JS'
            $get('status') === 'Planned' || $get('status') === 'In Progress'
            JS;
    }

    private static function visibleWhenStatusCompletedJs(): string
    {
        return <<<'JS'
            $get('status') === 'Completed'
            JS;
    }

    private static function syncCostAfterEffortChangeJs(): string
    {
        return <<<'JS'
            const isHighCost = $get('is_high_cost');
            const effort = $state;
            const costPerDay = isHighCost ? 1500 : 1000;
            $set('cost', effort * costPerDay);
            JS;
    }

    private static function syncCostAfterHighCostToggleJs(): string
    {
        return <<<'JS'
            const isHighCost = $state;
            const effort = $get('effort_in_days');
            const costPerDay = isHighCost ? 1500 : 1000;
            $set('cost', effort * costPerDay);
            JS;
    }
}
