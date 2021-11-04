var izvodjaci=[];
var izvodjaci_id=[];
var e = document.getElementById("artist_id");

function dodaj(){
    sortList();
    var strUser = e.options[e.selectedIndex].text;
    var strUsersId = e.options[e.selectedIndex].value;
    var p = document.createElement("INPUT");
    p.setAttribute("type", "button");
    if(!izvodjaci.includes(strUser) && strUser != ""){
    izvodjaci.push(strUser);
    izvodjaci_id.push(strUsersId);
    p.classList.add("btn");
    p.classList.add("btn-secondary");
    p.classList.add("mr-1");
    strUserId=strUser.replace(/\s/g, '');
    p.setAttribute("id", strUserId);
    p.value= strUser + " x";
    var text = document.createTextNode(p.value);
    p.appendChild(text);
    var element = document.getElementById("izvodjaci");
    var child = document.getElementById("artist_id");
    element.insertBefore(p,child);
    p.setAttribute("onclick", 'izbrisi('+strUserId+','+strUsersId+')');
    child.remove(child.selectedIndex);
    child.selectedIndex="blank";
    document.getElementById("artists").value=izvodjaci_id;
    }
    else if(strUser == "")
    {
        alert('Izaberite izvođača iz liste')
    }
    else{
        alert('Izabrani izvođač je već dodat.');
    }
}

function izbrisi(x,id){
    document.getElementById(x.id).remove();
    Array.prototype.remove = function() {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };
    var option = document.createElement("option");
    option.text=x.value.substring(0,x.value.length-2);
    option.value=id;
    e.add(option);
    sortList();
    izvodjaci.remove(x.value.substring(0,x.value.length-2));
    console.log(id);
    izvodjaci_id.remove(id.toString());
    document.getElementById("artists").value=izvodjaci_id;
}
function sortList() {
    var list, i, switching, b, shouldSwitch;
    list = document.getElementById("artist_id");
    switching = true;
    while (switching) {
      switching = false;
      b = list.getElementsByTagName("OPTION");
      for (i = 0; i < (b.length - 1); i++) {
        shouldSwitch = false;
        if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        b[i].parentNode.insertBefore(b[i + 1], b[i]);
        switching = true;
      }
    }
  }