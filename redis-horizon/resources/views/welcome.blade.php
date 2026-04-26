<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redis Horizon demo</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 1rem;
            line-height: 1.5;
            color: #1e293b;
            background: linear-gradient(160deg, #f1f5f9 0%, #e2e8f0 45%, #cbd5e1 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .panel {
            width: 100%;
            max-width: 22rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgb(15 23 42 / 0.08), 0 10px 15px -3px rgb(15 23 42 / 0.08);
            border: 1px solid rgb(226 232 240 / 0.9);
            padding: 1.75rem 1.5rem;
        }

        h1 {
            margin: 0 0 0.35rem;
            font-size: 1.25rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: #0f172a;
        }

        p {
            margin: 0 0 1.25rem;
            font-size: 0.875rem;
            color: #64748b;
        }

        button {
            width: 100%;
            padding: 0.65rem 1rem;
            font-size: 0.9375rem;
            font-weight: 500;
            color: #fff;
            background: linear-gradient(180deg, #334155 0%, #1e293b 100%);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 1px 2px rgb(15 23 42 / 0.15);
            transition: transform 0.12s ease, box-shadow 0.12s ease;
        }

        button:hover {
            box-shadow: 0 2px 8px rgb(15 23 42 / 0.2);
        }

        button:active {
            transform: translateY(1px);
        }

        button:focus-visible {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }
    </style>
</head>

<body>
    <div class="panel">
        <h1>Demo mail</h1>
        <p>Queues the order shipped notification to the configured mail driver.</p>
        <form action="/" method="POST">
            @csrf
            <button type="submit">Send email</button>
        </form>
    </div>
</body>

</html>
