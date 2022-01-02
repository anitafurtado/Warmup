export {applyTemplate, displayWarmups}

function applyTemplate(data, targetid,templateid){
    let target = document.getElementById(targetid);
    let template = Handlebars.compile(
      document.getElementById(templateid).textContent
      );
     let finalList=template(data);
    target.innerHTML=finalList;
}

function displayWarmups(data, targetid, templateid){
    applyTemplate({'warmups':data}, targetid,templateid)
}