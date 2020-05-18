var g_bRe = false;
var g_nOrg;
var g_nDepth;
function checkComment()
{
 if (g_bRe && g_nOrg > 0 && g_nDepth > 0)
 {
  document.write.memo.value = "<!--"+g_nOrg+"|"+g_nDepth+"-->"+document.write.memo.value;
 }
 document.write.submit();
 
 return;
}


function reComment(nOrg,nDepth)
{
if (g_nOrg==nOrg && g_nDepth==nDepth)
{
g_nOrg = 0;
g_nDepth = 0;
g_bRe = false;
//alert("답변 모드를 해제합니다");
}
else
{
g_nOrg = nOrg;
g_nDepth = nDepth;
g_bRe = true;
//alert("답변 모드로 설정합니다");
}
}

var cur_form_location = 0;

function click_reply(pid, depth) { 

if (depth > 25) {
        alert("더이상 답변을 달 수 없습니다.");
        return;
    }

    var current_form;
    var dest_form;

    if (cur_form_location == pid) {

        current_form = document.getElementById("form_"+pid);
        dest_form = document.getElementById("form_0");
        dest_form.innerHTML = current_form.innerHTML
        dest_form.style.display = "";
        current_form.innerHTML = "";
        current_form.style.display = "none";

        document.write.pid.value = '0';
        document.write.depth.value = '0';

        cur_form_location = 0;

    } else {

        var current_form = document.getElementById("form_"+cur_form_location);
        var dest_form = document.getElementById("form_"+pid);
        dest_form.innerHTML = current_form.innerHTML
        dest_form.style.display = "";

        current_form.innerHTML = "";
        current_form.style.display = "none";

        document.write.pid.value = pid;
        document.write.depth.value = depth;

        cur_form_location = pid;

    }
document.write.memo.focus();
//document.getElementsByTagName('DIV').iView.focus();
} 