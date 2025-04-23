<!DOCTYPE html>
<html>
<head>
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/swagger-ui/swagger-ui.css'); ?>" >
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/swagger-ui/favicon-32x32.png'); ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/swagger-ui/favicon-16x16.png'); ?>" sizes="16x16" />
    <style>
        html { box-sizing: border-box; overflow: -moz-scrollbars-vertical; overflow-y: scroll; } *, *:before, *:after { box-sizing: inherit; }
        body { margin:0; background:#fafafa; }
    </style>
</head>
<body>
    <div id="swagger-ui"></div>
    <script src="<?php echo base_url('assets/swagger-ui/swagger-ui-bundle.js'); ?>" charset="UTF-8"> </script>
    <script src="<?php echo base_url('assets/swagger-ui/swagger-ui-standalone-preset.js'); ?>" charset="UTF-8"> </script>
    <script>
    window.onload = function() {
      // Begin Swagger UI call region
      const ui = SwaggerUIBundle({
        url: "<?= site_url('swagger/json') ?>",
        dom_id: '#swagger-ui',
        deepLinking: true,
        presets: [
          SwaggerUIBundle.presets.apis,
          SwaggerUIStandalonePreset
        ],
        plugins: [
          SwaggerUIBundle.plugins.Download,
        ],
        layout: "StandaloneLayout"
      })
      window.ui = ui
    }
  </script>
</body>
</html>
