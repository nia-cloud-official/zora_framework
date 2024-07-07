<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zora</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Zora</h1>
        <table>
            <thead>
                <tr>
                    <th>Database Type</th>
                    <th>Action</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MySQL</td>
                    <td><button class="run-test" data-dbtype="mysql">Run Tests</button></td>
                    <td id="result-mysql">Pending</td>
                </tr>
                <tr>
                    <td>PostgreSQL</td>
                    <td><button class="run-test" data-dbtype="pgsql">Run Tests</button></td>
                    <td id="result-pgsql">Pending</td>
                </tr>
                <tr>
                    <td>MongoDB</td>
                    <td><button class="run-test" data-dbtype="mongodb">Run Tests</button></td>
                    <td id="result-mongodb">Pending</td>
                </tr>
            </tbody>
        </table>
        <div id="report"></div>
    </div>
    <script src="/assets/js/script.js"></script>
</body>
</html>
