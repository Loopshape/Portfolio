module.exports = {
  "inputs": {
    "name": {
      "example": "John Doe",
      "friendlyName": "name",
      "required": true
    },
    "email": {
      "example": "username@domain.tld",
      "friendlyName": "email",
      "required": true
    },
    "password": {
      "example": 123456,
      "friendlyName": "password",
      "required": true
    }
  },
  "exits": {
    "success": {
      "friendlyName": "then",
      "example": {
        "name": "John Doe",
        "email": "username@domain.tld",
        "password": 123456,
        "id": 123,
        "createdAt": "2015-05-13T00:53:31.992Z",
        "updatedAt": "2015-05-13T00:53:31.992Z"
      }
    },
    "error": {
      "example": undefined
    }
  },
  "defaultExit": "success",
  "fn": function(inputs, exits, env) {
    env.sails.models.user.create(env.sails.util.objCompact(inputs)).exec(function(err, records) {
      if (err) {
        return exits.error(err);
      }
      return exits.success(records);
    });
  },
  "identity": "create_user"
};