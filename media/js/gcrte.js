
var isHTMLMode = false
    document.onreadystatechange = function() { 
    idContent.document.designMode = "On"; 
}

//this code checks whether or not to use innerText or textContent for IE or Firefox, respectively.
var hasInnerText;
if(document.all){
    hasInnerText = 2;
} else{
    hasInnerText = 1;
}
 

function setMode(bMode) {
    var sTmp;
    isHTMLMode = bMode;
    
    if (isHTMLMode) {
        if(hasInnerText == 1){
            sTmp = idContent.document.body.innerHTML;
            idContent.document.body.textContent = sTmp;
        }
        else {
            sTmp = idContent.document.body.innerHTML;
            idContent.document.body.innerText = sTmp;
        }
        document.getElementById("editor-icons").style.display = "none";
    } 
    else {
        if(hasInnerText == 1){
            sTmp = idContent.document.body.textContent;
            idContent.document.body.innerHTML = sTmp;
        }
        else {
            sTmp = idContent.document.body.innerText;
            idContent.document.body.innerHTML = sTmp;
        }
    document.getElementById("editor-icons").style.display = "block";
    }
    
    idContent.focus();
}

function cmdExec(cmd,opt) {
    if (isHTMLMode) {
        alert("Please uncheck 'Edit HTML'");
        return;
    }

    idContent.document.execCommand(cmd,"",opt);
    idContent.focus();
}

function foreColor()
{
    var arr = showModalDialog("selcolor.htm","","font-family:Verdana; font-size:12; dialogWidth:29em; dialogHeight:28em" );
    if (arr != null) cmdExec("ForeColor",arr);    
}