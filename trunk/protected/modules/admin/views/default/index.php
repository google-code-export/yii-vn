<?php
$this->breadcrumbs = array(
    $this->module->id,
);
$allController  =  array();
$list = array('.','..','.svn','layouts');
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($sub_dir = readdir($dh)) !== false) {
            if (!(in_array($sub_dir, $list))) {
                $url = '/admin/'.$sub_dir;
                $label = 'Manage '.$sub_dir;
                $link_temp = array('label'=>$label, 'url'=>array($url));
                array_push($allController, $link_temp);
            }
        } 
    }
    closedir($dh);
}
$this->widget('zii.widgets.CMenu',array(
			'items'=>$allController,
		)); ?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
    This is the view content for action "<?php echo $this->action->id; ?>".
    The action belongs to the controller "<?php echo get_class($this); ?>"
    in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
    You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>