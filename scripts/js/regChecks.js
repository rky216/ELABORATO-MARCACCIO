window.onload = function(){
    document.getElementById("RegConfirm").disabled = true;
    setInterval(Check, 1000);
}
 

function Check()
{
    var name = document.getElementById("RegName").value;
    var surname = document.getElementById("RegSurname").value;
    var usr = document.getElementById("RegUser").value;
    var psw1 = document.getElementById("RegPsw").value;
    var psw2 = document.getElementById("RegPswCheck").value;
    var str = "Inserisci un";
    var set = true;
    if(!name)
        str += " nome!";
    else if(!surname)
        str += " cognome!";
    else if(!usr)
        str += " nome utente valido!"
    else if(!psw1)
        str += "a password valida!";
    else if(psw1!=psw2)
        str = "Le due password non corrispondo!";
    else
        set = ChangeState();
    document.getElementById("RegConfirm").disabled = set;
    document.getElementById("Help").innerHTML = str;
    console.log(str);
}

function ChangeState()
{
    document.getElementById("RegConfirm").disabled = false;
    document.getElementById("Help").hidden = true;
    return false;
}