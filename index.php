<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="main.css">

	<script src="blockly/blockly_compressed.js"></script>
	<script src="blockly/blocks_compressed.js"></script>
	<script src="blockly/msg/js/es.js"></script>
	<script src="blockly/javascript_compressed.js"></script>

	<script src="libs/jquery-latest.js"></script>
	<script src="libs/jquery-ui-latest.js"></script>		
	<script src="libs/jquery.layout-latest.js"></script>
	

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.6.12/beautify.min.js"></script>
	<script src="http://wzrd.in/standalone/peaks.js"></script>

	<script type="text/javascript">

	$(document).ready(function () {
		$('body').layout({
			west__size:			.50
		
		});
	});

	</script>



</head>
<body>


		<div class="pane ui-layout-center"  id="blocklyDiv">
			Blockly (Aqui van pestañas de las cosas que tienes abiertas) 
		</div>
		<div class="pane ui-layout-north">Barra Herramientas</div>
		<div class="pane ui-layout-south">Linea temporal + visualizacion del audio (Donde se controlan los eventos que genera la cancion)
			<input type="button" id="add_base" value="+" onclick="add_base();">	
			<input type="button" id="add_beat" value="+p" onclick="add_beat_pattern();">	
			<input type="button" id="add_song" value="+s" onclick="add_song();">
			
		</div>
		<div class="pane ui-layout-east">Preview (+ codigo)
			<input type="button" id="refresh_code" value="Refresh" onclick="refresh_code_preview();">
			<div id="code_preview"></div>
		</div>



	

    <?php  include('toolbox.xml');  include('workspace.xml'); ?>

	<script>
	
	var blocklyArea = document.getElementById('blocklyArea');
	var blocklyDiv = document.getElementById('blocklyDiv');
	var workspace = Blockly.inject(blocklyDiv,
		{media: 'media/',
		 toolbox: document.getElementById('toolbox')});
	var onresize = function(e) {
	  // Compute the absolute coordinates and dimensions of blocklyArea.    https://blockly-demo.appspot.com/static/demos/blockfactory/index.html#jzitg7
	  var element = blocklyArea;
	  var x = 0;
	  var y = 0;
	  do {
		x += element.offsetLeft;
		y += element.offsetTop;
		element = element.offsetParent;
	  } while (element);
	  // Position blocklyDiv over blocklyArea.
	  blocklyDiv.style.left = x + 'px';
	  blocklyDiv.style.top = y + 'px';
	  blocklyDiv.style.width = blocklyArea.offsetWidth + 'px';
	  blocklyDiv.style.height = blocklyArea.offsetHeight + 'px';
	};
	window.addEventListener('resize', onresize, false);
	onresize();
	var workspaceBlocks = document.getElementById("workspaceBlocks"); 
	Blockly.Xml.domToWorkspace(workspace, workspaceBlocks);
	Blockly.svgResize(workspace);
	
	function refresh_code_preview() {
		// The function insert the code in the object with id as the parameter
		Blockly.JavaScript.addReservedWords('code');
		var code = Blockly.JavaScript.workspaceToCode(workspace);
		var myElement = document.getElementById("code_preview"); 

		res = js_beautify(code, { indent_size: 2 });
		myElement.innerHTML = "<pre>".concat(res,"</pre>");
		Blockly.svgResize(workspace);
	}
	
	Blockly.Blocks['setup'] = {
	  init: function() {
		this.appendStatementInput("setup_process")
		    .setCheck(null)
		    .appendField("setup");
		this.setColour(0);
		this.setTooltip('');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['draw'] = {
	  init: function() {
		this.appendStatementInput("draw_process")
		    .setCheck(null)
		    .appendField("draw");
		this.setColour(230);
		this.setTooltip('');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['drum_pattern'] = {
	  init: function() {
		this.appendDummyInput()
		    .appendField("drum pattern")
		    .appendField(new Blockly.FieldTextInput("xoxxo"), "pattern");
		this.setColour(230);
		this.setTooltip('');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['key_pressed'] = {
	  init: function() {
		this.appendStatementInput("key_pressed_process")
		    .setCheck(null)
		    .appendField("key_pressed");
		this.setColour(230);
		this.setTooltip('');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['createcanvas'] = {
	  init: function() {
		this.appendValueInput("Width")
		    .setCheck("Number")
		    .appendField("Width:");
		this.appendValueInput("Height")
		    .setCheck("Number")
		    .appendField("Height:");
		this.setInputsInline(true);
		this.setPreviousStatement(true, null);
		this.setNextStatement(true, null);
		this.setColour(230);
		this.setTooltip('');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['background'] = {
	  init: function() {
		this.appendValueInput("colour")
		    .setCheck("colour")
		    .appendField("Set background to:");
		this.setPreviousStatement(true, null);
		this.setNextStatement(true, null);
		this.setColour(230);
		this.setTooltip('');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['ellipse'] = {
	  init: function() {
		this.appendValueInput("pos")
		    .setCheck("point")
		    .appendField("Elipse")
		    .appendField("Position:");
		this.appendValueInput("W")
		    .setCheck("Number")
		    .setAlign(Blockly.ALIGN_RIGHT)
		    .appendField("W:");
		this.appendValueInput("H")
		    .setCheck("Number")
		    .setAlign(Blockly.ALIGN_RIGHT)
		    .appendField("H:");
		this.setPreviousStatement(true, null);
		this.setNextStatement(true, null);
		this.setColour(230);
		this.setTooltip('Draw a ellipse');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['point'] = {
	  init: function() {
		this.appendValueInput("x")
		    .setCheck("Number")
		    .appendField("Point:")
		    .appendField("x:");
		this.appendValueInput("y")
		    .setCheck("Number")
		    .appendField("y:");
		this.setInputsInline(true);
		this.setOutput(true, "point");
		this.setColour(230);
		this.setTooltip('');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['key'] = {
	  init: function() {
		this.appendDummyInput()
		    .appendField("key pressed");
		this.setOutput(true, "key");
		this.setColour(90);
		this.setTooltip('Devuelve null si ninguna pulsada o la que sea en caso de que haya alguna');
		this.setHelpUrl('');
	  }
	};

	Blockly.Blocks['event'] = {
	  init: function() {
		this.appendDummyInput()
		    .appendField("event");
		this.appendDummyInput()
		    .appendField("name:")
		    .appendField(new Blockly.FieldTextInput("event"), "NAME");
		this.appendStatementInput("event_process")
		    .setCheck(null);
		this.setInputsInline(false);
		this.setColour(230);
		this.setTooltip('Que se va a ejecutar cuando se produzca ese evento');
		this.setHelpUrl('');
	  }
	};	
	
	Blockly.JavaScript['setup'] = function(block) {
	  var statements_setup_process = Blockly.JavaScript.statementToCode(block, 'setup_process');
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};

	Blockly.JavaScript['draw'] = function(block) {
	  var statements_draw_process = Blockly.JavaScript.statementToCode(block, 'draw_process');
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};

	Blockly.JavaScript['drum_pattern'] = function(block) {
	  var text_pattern = block.getFieldValue('pattern');
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};

	Blockly.JavaScript['key_pressed'] = function(block) {
	  var statements_key_pressed_process = Blockly.JavaScript.statementToCode(block, 'key_pressed_process');
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};

	Blockly.JavaScript['createcanvas'] = function(block) {
	  var value_width = Blockly.JavaScript.valueToCode(block, 'Width', Blockly.JavaScript.ORDER_ATOMIC);
	  var value_height = Blockly.JavaScript.valueToCode(block, 'Height', Blockly.JavaScript.ORDER_ATOMIC);
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};

	Blockly.JavaScript['background'] = function(block) {
	  var value_colour = Blockly.JavaScript.valueToCode(block, 'colour', Blockly.JavaScript.ORDER_ATOMIC);
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};

	Blockly.JavaScript['ellipse'] = function(block) {
	  var value_pos = Blockly.JavaScript.valueToCode(block, 'pos', Blockly.JavaScript.ORDER_ATOMIC);
	  var value_w = Blockly.JavaScript.valueToCode(block, 'W', Blockly.JavaScript.ORDER_ATOMIC);
	  var value_h = Blockly.JavaScript.valueToCode(block, 'H', Blockly.JavaScript.ORDER_ATOMIC);
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};

	Blockly.JavaScript['point'] = function(block) {
	  var value_x = Blockly.JavaScript.valueToCode(block, 'x', Blockly.JavaScript.ORDER_ATOMIC);
	  var value_y = Blockly.JavaScript.valueToCode(block, 'y', Blockly.JavaScript.ORDER_ATOMIC);
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...';
	  // TODO: Change ORDER_NONE to the correct strength.
	  return [code, Blockly.JavaScript.ORDER_NONE];
	};

	Blockly.JavaScript['key'] = function(block) {
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...';
	  // TODO: Change ORDER_NONE to the correct strength.
	  return [code, Blockly.JavaScript.ORDER_NONE];
	};

	Blockly.JavaScript['event'] = function(block) {
	  var text_name = block.getFieldValue('NAME');
	  var statements_event_process = Blockly.JavaScript.statementToCode(block, 'event_process');
	  // TODO: Assemble JavaScript into code variable.
	  var code = '...;\n';
	  return code;
	};
	</script>

</body>
</html>
