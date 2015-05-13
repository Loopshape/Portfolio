var Machine = require("machine");
module.exports = {
    find: function(req, res) {
        Machine.build({
            inputs: {},
            exits: {
                respond: {}
            },
            fn: function(inputs, exits) {
                // LoopCode Mainframe
                sails.machines['0ccd2b47-a58e-4f8c-a3fd-d5a4ec77bfd5_4.4.0'].pickRandomItem({
                    "array": ["is destined to change lives", "is the wave of the future", "has world-changing potential", "loves to party", "never quits", "just can&rsquo;t stop", "doesn&rsquo;t know the meaning of &ldquo;failure&rdquo;", "smells like rich mahagony", "can bench press twice its body weight—IN GOLD", "slays dragons"]
                }).exec({
                    "error": function(loopcodeMainframe) {
                        return exits.error({
                            data: loopcodeMainframe,
                            status: 500
                        });

                    },
                    "success": function(loopcodeMainframe) {
                        return exits.respond({
                            data: {
                                appName: "LoopWeb",
                                description: loopcodeMainframe + (req.session.loopsession ? (req.session.loopsession + '') : '')
                            },
                            action: "display_view",
                            status: 200,
                            view: "homepage"
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