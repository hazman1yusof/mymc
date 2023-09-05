<!DOCTYPE html>
<html>
    <head>
        <title>Referral Letter</title>
    </head>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="{{ asset('pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('pdfmake/vfs_fonts.js') }}"></script>
    
    </object>
    
    <script>
        var mydata = {
            "docname":"{!!$ini_array['docname']!!}",
            "name":"{!!$ini_array['name']!!}",
            "newic":"{!!$ini_array['newic']!!}",
            "reffor":"{!!$ini_array['reffor']!!}",
            "exam":"{!!$ini_array['exam']!!}",
            "invest":"{!!$ini_array['invest']!!}",
            "refdate":"{!!$ini_array['refdate']!!}"
        };

        $(document).ready(function () {
            var docDefinition = {
                footer: function(currentPage, pageCount) {
                    return [
                        { text: currentPage.toString() + ' of ' + pageCount, alignment: 'center' }
                    ]
                },
                pageSize: 'A4',
                content: [
                    {
                        text: ['Date : ',{text: mydata.refdate+'\n', style: 'nobold'}],
                        style: 'hospname'
                    },
                    {
                        text: ['To : ',{text: 'Dr. '+mydata.docname+'\n\n', style: 'nobold'}],
                        style: 'totalbold'
                    },
                    'Dear Dr.\n\n',
                    {
                        text: ['Re : Name : ',{text: mydata.name+'\n', style: 'nobold'}],
                        style: 'totalbold'
                    },
                    {
                        text: ['I/C No : ',{text: mydata.newic+'\n\n', style: 'nobold'}],
                        style: 'newic'
                    },
                    {
                        text: [ 'The Above is referred for' ],
                        style: 'totalbold'
                    },
                    {
                        text: [ mydata.reffor ],
                        style: 'text'
                    },
                    {
                        text: [ 'Physical examination' ],
                        style: 'totalbold'
                    },
                    {
                        text: [ mydata.exam ],
                        style: 'text'
                    },
                    {
                        text: [ 'Investigation' ],
                        style: 'totalbold'
                    },
                    {
                        text: [ mydata.invest ],
                        style: 'text'
                    },
                    'Thank you,\n\n',
                    'Yours Faithfully,\n\n\n\n\n',
                    '____________________________________\n',
                    'Dr',
                ],
                styles: {
                    hospname: {
                        margin: [0, 60, 0, 0],
                        bold: true
                    },
                    refdate: {
                        alignment: 'center'
                    },
                    text: {
                        margin: [0, 2, 0, 15],
                    },
                    newic: {
                        margin: [20, 0, 0, 0],
                        bold: true
                    },
                    header: {
                        fontSize: 18,
                        bold: true,
                        margin: [0, 0, 0, 10]
                    },
                    subheader: {
                        fontSize: 16,
                        bold: true,
                        margin: [0, 10, 0, 5]
                    },
                    tableExample: {
                        fontSize: 9,
                        margin: [0, 5, 0, 15]
                    },
                    tableHeader: {
                        bold: true,
                        fontSize: 13,
                        color: 'black'
                    },
                    totalbold: {
                        bold: true
                    },
                    nobold:{
                        bold: false
                    }
                },
            };
            
            // pdfMake.createPdf(docDefinition).getBase64(function(data) {
            //     var base64data = "data:base64"+data;
            //     console.log($('object#pdfPreview').attr('data',base64data));
            //     // document.getElementById('pdfPreview').data = base64data;
            
            // });
            
            pdfMake.createPdf(docDefinition).getDataUrl(function(dataURL) {
                $('#pdfiframe').attr('src',dataURL);
            });
        });
        
        function make_header(){
            
        }
        
        // pdfMake.createPdf(docDefinition).getDataUrl(function(dataURL) {
        //     console.log(dataURL);
        //     document.getElementById('pdfPreview').data = dataURL;
        // });
        
        // jsreport.serverUrl = 'http://localhost:5488'
        // async function preview() {
        //     const report = await jsreport.render({
        //         template: {
        //             name: 'mc'
        //         },
        //         data:mydata
        //     });
        //     document.getElementById('pdfPreview').data = await report.toObjectURL()
        // }
        
        // preview().catch(console.error)
    </script>
    
    <body style="margin: 0px;">
        <iframe id="pdfiframe" width="100%" height="100%" src="" frameborder="0" style="width: 99vw;height: 99vh;"></iframe>
    </body>
</html>