
var data = {
    account:"5394116918",
    category :'bge',
} 

var first_page_count = true;

function start(){
    chrome.tabs.query({currentWindow: true, active: true}, function(tabs){
        if(data.category=='bge'){
           
            if(tabs[0].url!='https://www.bgequickcheckup.com/MainSearch.aspx'){
                var obj1 = {};
                obj1['first_page'] = 'y';
                chrome.storage.local.set(obj1);    
            
                chrome.tabs.create({url:'https://www.bgequickcheckup.com/MainSearch.aspx'}, function(tab) {
                });
            }else{

        }

        }else if(data.category=='pep'){
            if(tabs[0].url!='https://pepcoqhec.icfwebservices.com/AuditLogin.aspx'){
                var obj1 = {};
                obj1['first_page'] = 'y';
                chrome.storage.local.set(obj1);    
            
                chrome.tabs.create({url:'https://pepcoqhec.icfwebservices.com/AuditLogin.aspx'}, function(tab) {
                });
                
            }else{

            }
        }

    });
    
}

chrome.storage.local.get('campaign_start', function(result){
	if(result.campaign_start=='y') {
        chrome.storage.local.get('first_page',function(result){
            if(result.first_page=='y'){
                setTimeout(() => {
                    if(first_page_count==true){ 
                        var obj1 = {};
                        obj1['after_search'] = 'y';
                        chrome.storage.local.set(obj1)
                        $('#ctl00_PanelContent2_txtSearchValue').val(data.account);
                        $('#ctl00_PanelContent2_ddlSearchBy').val(2);
                        $('#ctl00_PanelContent2_btnSearch').trigger('click');
                        first_page_count = false;
                    }
                }, 5000);
            }
        })
    }
});


chrome.storage.local.get('campaign_start', function(result){
	if(result.campaign_start=='y') {
        chrome.storage.local.get('after_search',function(result){
            if(result.after_search=='y'){
                var idtoclick = $('.gridItem:first>td:first>a').attr("id");
                $('#'+idtoclick)[0].click();
                var count = true;
                
                setInterval(function(){
                    if(count==true){
                        var account = $("#ctl00_PageContent_txtCustomerAcct").val();
                        var address = $("#ctl00_PageContent_txtAddress1").val();
                        var title = $('input[name="ctl00$PageContent$rblCustomerTitle"]:checked').val();
                        var frame_type = $('input[name="ctl00$PageContent$rblWindowsFrameType"]:checked').val()
                        
                        if(account!='undefined' && address !='undefined'){
                            alert(title+' - '+frame_type);
                        }
                }
                count=false;
                },6000);
            }
        })
    }
});




// function start(item){
//     chrome.storage.local.get('campaign_start',function(result){
//         if(result.campaign_start=='y'){

//             $('#ctl00_PanelContent2_txtSearchValue').val(item);
//             $('#ctl00_PanelContent2_ddlSearchBy').val(2);
//             $('#ctl00_PanelContent2_btnSearch').trigger('click');

//             willIGetNewPhone
//             .then(showOff)                
//             .catch(error => console.log(error.message)); // fat arrow
//         }
//     })
// }


// const willIGetNewPhone = new Promise(
//     (resolve, reject) => {
            
//         setTimeout(function(){
            
//             // alert('fis');
//             showOff();
//              return resolve('123');        
//         },5000);        
              
//     }
// );

// const showOff = function (phone) {

//     // alert('hey');
//         var obj1 = {};
//         obj1['read'] = 'y';
//         chrome.storage.local.set(obj1);
//         // alert($("tr:first:contains('a')").attr("id"));
//         var idtoclick = $('.gridItem:first>td:first>a').attr("id");
//     $('#'+idtoclick)[0].click();
// };

// setInterval(checkIfGameAlreadyStarted, 15000);

// var count = true;
// function checkIfGameAlreadyStarted(){

//     chrome.storage.local.get('read', function(result){
//         if(result.read=='y'){
//             if(count==true){
//                 var account = $("#ctl00_PageContent_txtCustomerAcct").val();
//                 var address = $("#ctl00_PageContent_txtAddress1").val();
//                 var title = $('input[name="ctl00$PageContent$rblCustomerTitle"]:checked').val();
//                 var frame_type = $('input[name="ctl00$PageContent$rblWindowsFrameType"]:checked').val()
                
//                 if(title!='undefined'){
//                     alert(title+' - '+frame_type);
//                 }


//                 count=false;
//             }
            
//         }   
//     })

// }






//     longfunctionfirst(shortfunctionsecond);

//     // new Promise(function(resolve,reject){
        
            // $('#ctl00_PanelContent2_txtSearchValue').val('5278890451');
            // $('#ctl00_PanelContent2_ddlSearchBy').val(2);
            // $('#ctl00_PanelContent2_btnSearch').trigger('click')
//             // var rows = $('#ctl00_PanelContent2_gvSearch tr').length;

//             // for(var i=0;i<=20;i++){
//             //     alert(i);
//             //     if( $('#ctl00_PanelContent2_gvSearch tr').length==1){
//             //         alert('hey');
//             //     }
//             // }



//             // $('#ctl00_PanelContent2_btnSearch').trigger('click');
//             // var v = $('#ctl00_PanelContent2_txtSearchValue').val();
           
//             // // setTimeout(function(){
//             // //     if(v!=''){
//             // //         var rows = $('#ctl00_PanelContent2_gvSearch tr').length;
//             // //         alert(rows);
//             // //         return resolve(true);
//             // //     }
//             // // },5000)
//             // alert("Boom!---");
//             // setTimeout(function(){
//             //     alert("Boom!");
//             //   }, 2000);
            
            
           
//     // }).then(function(result){
//     //     alert('hey')
//     // // })
//     // $('#ctl00_PanelContent2_txtSearchValue').val('5278890451');
//     // $('#ctl00_PanelContent2_ddlSearchBy').val(2);
//     // $('#ctl00_PanelContent2_btnSearch').trigger('click')

// }

// function longfunctionfirst(callback) {
//     setTimeout(function() {
//         alert('first function finished');
//         document.getElementById('ctl00_PanelContent2_txtSearchValue').value='5278890451';
//         document.getElementById('ctl00_PanelContent2_ddlSearchBy').value='2';
       

//         if(typeof callback == 'function')
//             callback();
//     }, 3000);
// };

// function shortfunctionsecond() {
//     setTimeout('alert("second function finished");', 2000);
//     $('#ctl00_PanelContent2_btnSearch').trigger('click');

// };


//     chrome.tabs.getSelected(function(tab){
//         if(tab.url=="http://ec2-34-201-172-147.compute-1.amazonaws.com/index.php/admin"){

    
//             window.open('https://www.bgequickcheckup.com/MainSearch.aspx');
//         }else{
//             alert('not the url')
//         }
//     });
// }
// chrome.storage.local.get('campaign_start', function(result){
//     if(result.campaign_start=='y') {
//         $('#ctl00_PanelContent2_myLogin_UserName').val('hey');
//         // setInterval(function(){
//         //     // alert('hey time');
//         //     $('#ctl00_PanelContent2_myLogin_UserName').val('login');
//         // },500)
    
//     }
// });