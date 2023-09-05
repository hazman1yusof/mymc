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
                        text: 'Hospital Islam Az-Zahrah\n\n',
                        style: 'hospname'
                    },
                    {
                        text: mydata.refdate+'\n\n',
                        style: 'refdate'
                    },
                    'To : Dr. '+mydata.docname+'\n\n',
                    'Dear Dr.\n\n',
                    'Re : Name : '+mydata.name+'\n',
                    {
                        text: ['I/C No : '+mydata.newic+'\n\n'],
                        style: 'newic'
                    },
                    'The Above is referred for\n',
                    {
                        text: [ mydata.reffor+'\n\n' ],
                        style: 'text'
                    },
                    'Physical examination',
                    {
                        text: [ mydata.exam+'\n\n' ],
                        style: 'text'
                    },
                    'Investigation',
                    {
                        text: [ mydata.invest+'\n\n' ],
                        style: 'text'
                    },
                    'Thank you,\n\n',
                    'Yours Faithfully,\n\n\n\n\n',
                    '____________________________________\n',
                    'Dr',
                ],
                styles: {
                    hospname: {
                        fontSize: 16,
                        bold: true,
                        margin: [0, 40, 0, 0],
                        alignment: 'center'
                    },
                    refdate: {
                        alignment: 'center'
                    },
                    text: {
                        margin: [5, 5, 5, 5],
                    },
                    newic: {
                        margin: [20, 0, 0, 0],
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
                        bold: true,
                        fontSize: 10,
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