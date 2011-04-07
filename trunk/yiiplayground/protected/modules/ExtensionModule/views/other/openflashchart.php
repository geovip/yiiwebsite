<?php $this->breadcrumbs = array('Others' => array('other/index'), 'OpenFlashChart') ?>

<p>
	With this extension you can easy generate beauty charts on pages of your Yii application.
</p>

<p>
	If you want, you can get a newest version of this extension using this command (for *nix):
</p>

<pre>
bash$ svn checkout http://yiiopenflashchart.googlecode.com/svn/trunk/ yiiopenflashchart
</pre>

<p>
	Of course, you can download it from <strong>Downloads</strong> section here
	<a href="http://www.yiiframework.com/extension/yiiopenflashchart" target="_blank">http://www.yiiframework.com/extension/yiiopenflashchart</a> instead of svn.
</p>

<?php
Yii::app()->sc->setStart(__LINE__);

// Creating an Yii Extension component
$flashChart = Yii::createComponent('application.modules.ExtensionModule.extensions.yiiopenflashchart.EOFC2');

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);

// Minimum usage. You will always need at least this.
$flashChart->begin();
$flashChart->setData(array(1,2,2,3,5,6,1,9,6,4,5,6,7,8,0,8,2,2,1,9));
$flashChart->renderData('line');
$flashChart->render(300, 200);

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);

// Minimum with 2 datasets
$flashChart->begin();
$flashChart->setData(array(1,2,4,8),'{n}',false,'Apples');
$flashChart->setData(array(3,4,6,9),'{n}',false,'Oranges');
$flashChart->renderData('line',array('colour'=>'green'),'Apples');
$flashChart->renderData('line',array('colour'=>'orange'),'Oranges');
$flashChart->render(300,200);

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);

// Minimum with 2 seperate charts
$flashChart->begin();
$flashChart->setData(array(3,4,6,9),'{n}',false,'Potatoes');
$flashChart->setTitle('Veggies');
$flashChart->renderData('line',array('colour'=>'#cc3355'),'Potatoes');
$flashChart->render();

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);

$flashChart->setTitle('Fruits');
$flashChart->setData(array(1,2,4,8),'{n}',false,'Apples','dig');
$flashChart->setData(array(3,4,6,9),'{n}',false,'Oranges','dig');
$flashChart->renderData('line',array('colour'=>'#33cc33'),'Apples','dig');
$flashChart->renderData('line',array('colour'=>'#ccaa44'),'Oranges','dig');
$flashChart->render(500,500,'dig');

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);
	
// Customizing your chart and setting labels	
$flashChart->begin('SteppChart');
$flashChart->setTitle('Steppometer','{color:#880a88;font-size:15px;padding-bottom:20px;}');

$data['1']['Day']['date'] = 'October \'09';
$data['1']['Day']['count'] = '123';
$data['2']['Day']['date'] = 'November \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'December \'09';
$data['3']['Day']['count'] = 500;

$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');

$flashChart->setLegend('x','Dato');
$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');

$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,600,100)));

$flashChart->renderData();
$flashChart->render(400,300);

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);
	
// Scatter
$data = array();
for( $i=0; $i<360; $i+=5 )
{
	$data[] = array(
		'x' => number_format(sin(deg2rad($i)), 2, '.', ''),
		'y' => number_format(cos(deg2rad($i)), 2, '.', '')
	);
}

$flashChart->begin();
$flashChart->setData($data);
$flashChart->setTitle('Scatter');
$flashChart->axis('x',array('range' => array(-2,3,1)));
$flashChart->axis('y',array('range' => array(-2,2,1)));
$flashChart->renderData('scatter');
$flashChart->render(300,300);

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);

// Radar
$flashChart->begin('progress');
$flashChart->setTitle('Radar');
$flashChart->setData(array(3, 4, 5, 4, 3, 3, 2.5));
$flashChart->setRadarAxis(array(
	'max' => 5,
	'steps' => 1,
	'colour' => '#EFD1EF',
	'grid_colour' => '#EFD1EF',
	'label_colour' => '#343434',
	'labels' => array('0', '1', '2', '3', '4', '5')));
$flashChart->setToolTip(null, array('proximity' => true));
$flashChart->renderData('radar', array(
	'halo_size' => 1,
	'width' => 1,
	'dot_size' => 2,
	'colour' => '#45909F',
	'type' => 'filled',
	'fill_colour' => '#45909F',
	'fill_alpha' => 0.4,
	'loop' => true)
);
$flashChart->render(300,300);

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);

// Stacked Bars, multiple charts and dom id
$flashChart->begin();
$flashChart->setTitle('Stacked Bars');
$flashChart->axis('y',array('range' => array(0, 100, 10)));
$flashChart->setStackColours(array('#0000ff','#ff0000','#00FF00'));
$flashChart->setData(array(
	array(65,15,20),
	array(45,15,40),
	array(51,29,20),
	array(15,35,50),
));
$flashChart->renderData('bar_stack');
$flashChart->render(300,300);
$flashChart->setData(array(1,3,2,4),'{n}',false,'stuff','chart2');
$flashChart->renderData('line',array(),'stuff','chart2');
$flashChart->render(400,400,'chart2','chartDomId');
echo '<div id="chartDomId"></div>';

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();



Yii::app()->sc->setStart(__LINE__);

$data = null; // here we need to clean up any previous data for charts

// SKETCH - my favourite :)
$flashChart->begin('Sketch Chart');
$flashChart->setTitle('Sketchometer','{color:#880a88;font-size:15px;padding-bottom:20px;}');

$data['1']['Day']['date'] = 'Oct \'09';
$data['1']['Day']['count'] = '321';
$data['2']['Day']['date'] = 'Nov \'09';
$data['2']['Day']['count'] = 345;
$data['3']['Day']['date'] = 'Dec \'09';
$data['3']['Day']['count'] = 500;

$flashChart->setData($data);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');

$flashChart->setLegend('x','Dato');
$flashChart->setLegend('y','Skritt', '{color:#AA0aFF;font-size:12px;}');

$flashChart->axis('x',array('tick_height' => 10,'3d' => -10));
$flashChart->axis('y',array('range' => array(0,600,100)));

$flashChart->renderData('sketch', array(
	'colour' => '#81AC00',
	'outline_colour' => '#567300',
	'offset' => 5,
	'fun_factor' => 7,
));
$flashChart->render(200,300);

Yii::app()->sc->collect('php', Yii::app()->sc->getSourceToLine(__LINE__, __FILE__));
Yii::app()->sc->renderSourceBox();