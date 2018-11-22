var Twcoin = artifacts.require("./tw-coin.sol");

module.exports = function(deployer) {
    deployer.deploy(Twcoin);
};
