<style type="text/css">
    <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__.'/assets/css/debugger.min.css')) ?>
</style>
<div id="gear-toolbar">
    <img
		    src="data:image/png;base64,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"
		    width="40px" class="img-logo">
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th>File</th>
            <th>Expression</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($trace as $chronology): ?>
	        <tr>
                <td width="3%">
                    <?php if (strpos($chronology->call, 'start') !== false): ?>
	                    <span class="label label-success">start</span>
                    <?php elseif (strpos($chronology->call, 'line') !== false): ?>
	                    <span class="label label-info">line</span>
                    <?php elseif (strpos($chronology->call, 'marker') !== false): ?>
	                    <span class="label label-default">marker</span>
                    <?php elseif (strpos($chronology->call, 'stop') !== false): ?>
	                    <span class="label label-danger">stop</span>
                    <?php endif; ?>
                </td>
                <td width="35%">
                    <i class="text-muted"><?php echo $chronology->file . ':' . $chronology->line; ?></i>
                </td>
                <td>
                    <?php if (strpos($chronology->call, 'line') !== false): ?>
	                    <pre><code><?php echo(empty($chronology->expression) ? '' : trim($chronology->expression)); ?></code></pre>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    <?php echo file_get_contents(__DIR__ . '/assets/js/debugger.min.js') ?>
</script>