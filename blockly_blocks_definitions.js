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