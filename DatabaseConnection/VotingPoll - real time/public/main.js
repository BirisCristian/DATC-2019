const form = document.getElementById('vote-form');

form.addEventListener('submit', (e) => {
    const choice = document.querySelector('input[name=candidat]:checked').value;
    const data = { candidat: choice };


    fetch('http://localhost:3000/poll', {
        method: 'post',
        body: JSON.stringify(data),
        headers: new Headers({
            'Content-Type': 'application/json'
        })
    })
        .then(res => res.json())
        .then(data => console.log(data))
        .catch(err => console.logg(err));

    e.preventDefault();
});

fetch('http://localhost:3000/poll').then(res => res.json()).then(data => {
    const votes = data.votes;
    const totalVotes = votes.length;


    //console.log(data);

    //count vote points accumulator/ current val
   const voteCounts = votes.reduce((acc, vote) => ((acc[vote.candidat] = (acc[vote.candidat] || 0) + parseInt(vote.points)), acc), {});



    let dataPoints = [
        { label: 'Klaus Iohannis', y: voteCounts.Klaus_Iohannis },
        { label: 'Viorica Dăncilă', y: voteCounts.Viorica_Dăncilă },
        { label: 'Kelemen Hunor', y: voteCounts.Kelemen_Hunor },
        { label: 'Mircea Diaconu', y: voteCounts.Mircea_Diaconu }
    ];

    // let dataPoints = [
    //     { label: 'Klaus Iohannis', y: 0 },
    //     { label: 'Viorica Dăncilă', y: 0 },
    //     { label: 'Kelemen Hunor', y: 0 },
    //     { label: 'Mircea Diaconu', y: 0 }
    // ];

    const chartContainer = document.querySelector('#chartContainer');

    //if(chartContainer) {

    window.onload = function () {
        const chart = new CanvasJS.Chart('chartContainer', {


            animationEnabled: true,
            theme: 'theme1',
            title: {
                text: 'Situația actuală a voturilor'
            },
            legend: {
                horizontalAlign: "center",
                verticalAlign: "bottom"
            },


            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: true,
                toolTipContent: "<b>{label}</b>: {y} (#percent%)",
                indexLabel: "{label} : {y}",
                legendText: "{label} (#percent%)",
                indexLabelPlacement: "outside",
                dataPoints: dataPoints
            }]

            // data: [
            //     {
            //         Type: 'column', 
            //         dataPoints: dataPoints
            //     }
            // ]

            ///////////////////////////////// pie 
            // data: [{
            //     type: "pie",
            //     startAngle: 240,
            //     yValueFormatString: "##0.00\"%\"",
            //     indexLabel: "{label} {y}",
            //     dataPoints: dataPoints
            // }]
        });
        chart.render();


        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('2e34c6b8d558345d4823', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('votare-online');
        channel.bind('votare-presedinte', function (data) {
            //alert(JSON.stringify(data));




            dataPoints = dataPoints.map(x => {
                if (x.label == data.candidat) {
                    x.y += data.points;
                    return x;
                } else {
                    return x;
                }

            });
            chart.render();
        });
        $("#chartContainer").CanvasJSChart(options);

    }



 });
