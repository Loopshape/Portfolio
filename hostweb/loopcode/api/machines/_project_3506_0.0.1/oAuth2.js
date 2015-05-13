module.exports = {
  "inputs": {},
  "exits": {
    "error": {
      "example": undefined
    },
    "success": {
      "void": true,
      "friendlyName": "then",
      "variableName": "result",
      "description": "Normal outcome."
    }
  },
  "defaultExit": "success",
  "fn": function(inputs, exits, env) {
    return exits.success();
  },
  "identity": "oAuth2"
};