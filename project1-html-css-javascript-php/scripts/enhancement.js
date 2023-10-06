var minuteStart = 10;
var secondStart = 01;
function resetMinuteAndSecond() {
    minuteStart = 10;
    secondStart = 01;
}
const intervalCountDownAplication = setInterval(onCountDownApllyJob, 1000);
function onCountDownApllyJob() {
    let eleCount = document.getElementById("count-timer");
    if (eleCount) {
        if (secondStart >= 0 && minuteStart >= 0) {

            if (minuteStart == 0 && secondStart == 0) {
                alert("Your time is over");
                window.location.href = "./index.php";
                minuteStart = -1;
                secondStart = -1;
                return;
            }


            if (secondStart == 0) {
                minuteStart--;
                secondStart = 59;
            }
            else {
                secondStart--;
            }

            let displayMinute = String(minuteStart).padStart(2, '0');
            let displaySecond = String(secondStart).padStart(2, '0');
            eleCount.innerHTML = `${displayMinute}:${displaySecond}`;
        }
    }
}

function displayJobDynamically() {
    let jobs = [
        {
            id: "22312",
            title: "DevOps Engineer (#22312)",
            subTitle: "Full time | $100000 - $120000 p.a",
            descriptions: [
                {
                    title: "Description",
                    content: [`You will be responsible for the construction and development of the pipeline, taking this product
                    to
                    new
                    heights across the national landscape. This role is focused on giving you a lot of autonomy and
                    continuous learning opportunities as the DevOps space is constantly changing and expanding.`]
                },
                {
                    title: "Key responsibilities",
                    content: [
                        "Developing complex programs and scripts to support CI/CD processes",
                        "Provide release management, database and application support",
                        "Get involved in API debugging and development",
                        "Provide guidance for other engineers",
                    ]
                },
                {
                    title: "Technical Requirements",
                    content: [
                        "Bachelor's degree in Computer Science, Information Technology, or related field",
                        `Extensive experience with Azure services such as Storage Accounts, APIM, Azure Front Door,
                        Azure
                        Functions, Azure Web Apps, Azure Service Bus`,
                        "Experience with Docker and Managed Kubernetes Service",
                        "Experience with infrastructure as code and CI/CD pipelines",
                    ]
                },
            ],
            imgData: "images/devops.png"
        },
        {
            id: "12225",
            title: "Cloud Engineer (#12225)",
            subTitle: "Full time | $120000 - $150000 p.a",
            descriptions: [
                {
                    title: "Description",
                    content: [`Due to our continued success, we are expanding and are looking for talented individuals to join
                    us as
                    Cloud Engineers. We look for strong technical performance, experience across multiple technology
                    areas
                    and solutions, customer obsession, a positive attitude, and a willingness to challenge and
                    learn.`]
                },
                {
                    title: "Key responsibilities",
                    content: [
                        `Technical support and troubleshooting for a variety of exciting technologies (AWS,
                            Microsoft)`,
                        "Communication with customers on technical issues",
                        "Manage, troubleshoot, and resolve incidents, service requests, events, and problem tickets",
                        "Provide a superior customer service experience",
                    ]
                },
                {
                    title: "Technical Requirements",
                    content: [
                        "Bachelor's degree in Computer Science, Information Technology, or related field",
                        `5+ years of experience in cloud engineering, with a focus on AWS/GCP`,
                        `Extensive knowledge of Golang and Python, and experience developing cloud-native
                        applications`,
                        `Excellent communication skills with the ability to communicate complex technical concepts to
                        non-technical stakeholders`,
                    ]
                },
            ],
            imgData: "images/cloud.jpeg"
        }
    ];

    let elementAppend = document.getElementById("dynamic-data");

    for (let i = 0; i < jobs.length; i++) {

        let jobSingle = jobs[i];

        let imgTag = document.createElement("img");
        imgTag.classList.add("job-img");
        imgTag.src = jobSingle.imgData;

        let asideEle = document.createElement("aside");
        asideEle.appendChild(imgTag);
        

        let aTag = document.createElement("a");
        aTag.href = `./apply.php?jobId=${jobSingle.id}`;
        aTag.classList.add("job-description-hyperlink");

        //#region SECTION
        let sectionTag = document.createElement("section");
        sectionTag.id = jobSingle.id;
        sectionTag.classList.add("job");

        let hTitleTag = document.createElement("h2");
        hTitleTag.innerText = jobSingle.title;
        sectionTag.appendChild(hTitleTag);

        let hSubTitleTag = document.createElement("h3");
        hSubTitleTag.innerText = jobSingle.subTitle;
        sectionTag.appendChild(hSubTitleTag);

        let resultStr = "";
        for(let j = 0;j<jobSingle.descriptions.length;j++)
        {
            let htmlInside = "<li>";
            let dataItem = jobSingle.descriptions[j];

            let lstUl = dataItem.title + ( j == 0 ? "<p>" : "<ul>");
            for(let k = 0;k < dataItem.content.length ; k++)
            {
                let str = dataItem.content[k];
                if(j == 0)
                {
                    lstUl += str;
                }
                else
                {
                    lstUl += `<li>${str}</li>`;
                }
            }
            lstUl += j == 0 ? "</p>" : "</ul>";
            htmlInside += lstUl;
            htmlInside += "</li>";
            resultStr += htmlInside;
        }
        

        let olTag = document.createElement("ol");
        olTag.classList.add("job-ol")
        olTag.innerHTML = resultStr;
        sectionTag.appendChild(olTag);
        aTag.appendChild(sectionTag);
        //#endregion
        

        elementAppend.appendChild(asideEle);
        elementAppend.appendChild(aTag);       


    }

}