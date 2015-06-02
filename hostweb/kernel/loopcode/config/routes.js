module.exports.routes = {
  "get /signup": {
    "target": "SignupController.find"
  },
  "get /": {
    "target": "Home$Controller.find"
  }
};