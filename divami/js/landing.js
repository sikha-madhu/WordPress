let counters = document.querySelectorAll('.counter');
console.log(counters);
counters.forEach((counter)=>{
    counter.children[0].innerText='0';
    const updateCounter = ()=>{
            const targetValue = counter.getAttribute("data-target");
            console.log(targetValue);
            const c = +counter.children[0].innerText;
            console.log(c);
            const increment = targetValue/50;
            console.log(increment );
            if (c+increment < targetValue){
                counter.children[0].innerText=`${Math.ceil(c+increment)}`;
                setTimeout(updateCounter,30);// before 20
            }
            else{
                counter.children[0].innerText=targetValue;
            }
    };
    setTimeout(updateCounter,2100); // before 2500
});