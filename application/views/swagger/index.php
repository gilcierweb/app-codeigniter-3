<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Documentation</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/swagger-ui/swagger-ui.css') ?>">
</head>
<body>
    <div id="swagger-ui"></div>
    
    <script src="<?= base_url('assets/swagger-ui/swagger-ui-bundle.js') ?>"></script>
    <script src="<?= base_url('assets/swagger-ui/swagger-ui-standalone-preset.js') ?>"></script>
    <script>
    window.onload = function() {
        const ui = SwaggerUIBundle({
            url: "<?= base_url('swagger.json') ?>",
            dom_id: '#swagger-ui',
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            layout: "StandaloneLayout"
        });
    }
    </script>
</body>
</html>
