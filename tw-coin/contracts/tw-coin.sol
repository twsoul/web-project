pragma solidity ^0.4.18;

import "zeppelin-solidity/contracts/token/ERC20/StandardToken.sol";

contract Sujicoin is StandardToken {
    string public name = "twcoin";
    string public symbol = "TW"; //통화단위
    uint public decimals = 2; //자리수
    uint public INITIAL_SUPPLY = 10000 * (10 ** decimals); //초기 공급량

    //생성자
    function Sujicoin() public {
        balances[msg.sender] = INITIAL_SUPPLY;
    }
}
