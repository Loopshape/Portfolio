var Machine = require("machine");
module.exports = {
    'find': function(req, res) {
        Machine.build({
            inputs: {
                "username": {
                    "example": "John Doe",
                    "required": true
                },
                "useremail": {
                    "example": "username@domain.tld",
                    "required": true
                }
            },
            exits: {
                respond: {}
            },
            fn: function(inputs, exits) {
                // Encrypt password
                sails.machines['e05a71f7-485d-443a-803e-029b84fe73a4_2.2.0'].encryptPassword({
                    "password": "13371337leetfleet"
                }).exec({
                    "error": function(encryptPassword) {
                        return exits.error({
                            data: encryptPassword,
                            status: 500
                        });

                    },
                    "success": function(encryptPassword) {
                        // Create User
                        sails.machines['_project_3506_0.0.4'].create_user({
                            "name": inputs.username,
                            "email": inputs.useremail,
                            "password": 0
                        }).setEnvironment({
                            sails: sails
                        }).exec({
                            "success": function(createUser) {
                                // Save to session
                                sails.machines['0ab17fbc-e31c-430d-85a4-929318f5e715_0.3.1'].save({
                                    "key": "loopuser",
                                    "value": inputs.useremail + inputs.username
                                }).setEnvironment({
                                    req: req
                                }).exec({
                                    "error": function(saveToSession) {
                                        return exits.error({
                                            data: saveToSession,
                                            status: 500
                                        });

                                    },
                                    "success": function(saveToSession) {
                                        // List User
                                        sails.machines['_project_3506_0.0.4'].find_user({}).setEnvironment({
                                            sails: sails
                                        }).exec({
                                            "success": function(listUser) {
                                                return exits.respond({
                                                    data: listUser,
                                                    action: "respond_with_result_and_status",
                                                    status: 200
                                                });

                                            },
                                            "error": function(listUser) {
                                                return exits.error({
                                                    data: listUser,
                                                    status: 500
                                                });

                                            }
                                        });

                                    }
                                });

                            },
                            "error": function(createUser) {
                                return exits.error({
                                    data: createUser,
                                    status: 500
                                });

                            }
                        });

                    }
                });
            }
        }).configure(req.params.all(), {
            respond: res.response,
            error: res.negotiate
        }).exec();
    }
};