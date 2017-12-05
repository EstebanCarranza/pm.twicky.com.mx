function validarPasswords(idInput1, idInput2)
{
    var id1 = document.getElementById(idInput1).value;
    var id2 = document.getElementById(idInput2).value;
          
    if(id1 == id2)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}
