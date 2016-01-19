/**
 * Created by hasso on 12/01/2016.
 */
function getProduits(){
        console.log("hello");
    var xhr = new XMLHttpRequest();

        xhr.open('POST','produit/create',true);

    xhr.onload=function(e){
        var r  =JSON.parse(this.response);
        creerTab(r);
    };
    xhr.send();
}
function creerTab(r){
    console.log(r);
    var tabBody, tabDatas, line, cell;
    var lineHead, thead;
    // creation de la table
    //tabBody=document.createElement('table');
    tabBody=document.querySelector('#tabR');
    tabBody.innerHTML="";
    // creation du thead
    //var _tabHead=['_id','address','brough','cuisine','grades','name','restaurant_id'];
    var _tabHead=['Produit','Referent','Producteur'];
    lineHead=document.createElement('tr');
    _tabHead.forEach(function(element,index){
        thead=document.createElement('th');
        thead.innerHTML=element;
        lineHead.appendChild(thead);
    })
    tabBody.appendChild(lineHead);
    /*// insertion des datas dans la table
    var _adresse, _addr;
    var _grades, _date;
    r.forEach(function (element, i) {
        _grades="";
        r[i].grades.forEach(function(grade,num){
            _date=new Date(grade.date);
            _grades+=_date.getFullYear()+"-"+toTen(_date.getMonth()+1)+"-"+toTen(_date.getDate())+"<br>G/S : ["+grade.grade+"/"+grade.score+"]<br><br>";
        })
        _addr=r[i].address;
        _adresse=_addr.building+"<br>Lt :"+_addr.coord[0]+"<br>Lg :"+_addr.coord[1]+"<br><br>"+_addr.street+"<br>"+_addr.zipcode;
        //tabDatas=[r[i]._id,
        tabDatas=[r[i].restaurant_id,
            "<b>"+r[i].name+"</b>",
            _adresse,
            r[i].borough,
            r[i].cuisine,
            _grades
        ];
        line=document.createElement('tr');
        tabDatas.forEach(function (elem, index) {
            cell=document.createElement('td');
            cell.innerHTML=elem;
            line.appendChild(cell);
        })
        // operations
        cell=document.createElement('td');
        cell.innerHTML="<button onclick='suppRestaurant("+r[i].restaurant_id+")' title='delete' class='icon-cross'></button>";
        cell.innerHTML+="<button onclick='modifRestaurant("+r[i].restaurant_id+")' title='update' class='icon-pencil'></button>";
        line.appendChild(cell);

        tabBody.appendChild(line);
    });*/
}

