module.exports = {
  "inputs": {
    "name": {
      "example": "John Doe",
      "friendlyName": "name"
    },
    "email": {
      "example": "username@domain.tld",
      "friendlyName": "email"
    },
    "password": {
      "example": 123456,
      "friendlyName": "password"
    },
    "criteria": {
      "friendlyName": "criteria",
      "typeclass": "dictionary",
      "description": "Waterline search criteria to use in retrieving User instances"
    }
  },
  "exits": {
    "success": {
      "friendlyName": "then",
      "example": [{
        "name": "John Doe",
        "email": "username@domain.tld",
        "password": 123456,
        "id": 123,
        "createdAt": "2015-05-13T00:53:31.992Z",
        "updatedAt": "2015-05-13T00:53:31.992Z"
      }]
    },
    "error": {
      "example": undefined
    }
  },
  "defaultExit": "success",
  "fn": function(inputs, exits, env) {
    env.sails.models.user.update(inputs.criteria, env.sails.util.omit(env.sails.util.objCompact(inputs), 'criteria')).exec(function(err, records) {
      if (err) {
        return exits.error(err);
      }
      return exits.success(records);
    });
  },
  "identity": "update_user"
};