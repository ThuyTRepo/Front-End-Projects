function onLoadJobDocument(){
    let elm = document.getElementsByClassName("job-description-hyperlink");
    for(let i = 0;i > elm.length;i++)
    {
        elm[i].addEventListener("click", onClickJobDescription);
    }
}

function onClickJobDescription(event) {
    let sectionJob = event.currentTarget.querySelector("section.job");
    if (sectionJob.id) {
        let jobId = sectionJob.id;
        let jobRef = localStorage.getItem(jobId);
        if(jobRef)
        {
            localStorage.setItem(jobId, (+jobRef)+ 1);
        }
        else
        {
            localStorage.setItem(jobId, 1);
        }
    }
}