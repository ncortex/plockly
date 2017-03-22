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