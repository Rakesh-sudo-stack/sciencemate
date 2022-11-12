const configData = async () => {
    let res = await fetch('js/config.json',{
        method: 'GET'
    });
    res = await res.json();
    console.log(res);
    Object.keys(res).forEach((element)=>{
        Array.from(document.querySelectorAll(`.${element}`)).forEach((el)=>{
            el.innerHTML = res[element];
        })
    })
}

configData();