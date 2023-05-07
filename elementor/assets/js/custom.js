jQuery(document).ready(function ($) {
   // your jQuery code here

   $("#wsbp_booking_calender").calendar({
      type: "date",
      inline: true,
   });
   //DOM elements
   const DOMstrings = {
      stepsBtnClass: "multisteps-form__progress-btn",
      stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
      stepsBar: document.querySelector(".multisteps-form__progress"),
      stepsForm: document.querySelector(".multisteps-form__form"),
      stepsFormTextareas: document.querySelectorAll(
         ".multisteps-form__textarea"
      ),
      stepFormPanelClass: "multisteps-form__panel",
      stepFormPanels: document.querySelectorAll(".multisteps-form__panel"),
      stepPrevBtnClass: "js-btn-prev",
      stepNextBtnClass: "js-btn-next",
   };

   //remove class from a set of items
   const removeClasses = (elemSet, className) => {
      elemSet.forEach((elem) => {
         elem.classList.remove(className);
      });
   };

   //return exect parent node of the element
   const findParent = (elem, parentClass) => {
      let currentNode = elem;

      while (!currentNode.classList.contains(parentClass)) {
         currentNode = currentNode.parentNode;
      }

      return currentNode;
   };

   //get active button step number
   const getActiveStep = (elem) => {
      return Array.from(DOMstrings.stepsBtns).indexOf(elem);
   };

   //set all steps before clicked (and clicked too) to active
   const setActiveStep = (activeStepNum) => {
      //remove active state from all the state
      removeClasses(DOMstrings.stepsBtns, "js-active");

      //set picked items to active
      DOMstrings.stepsBtns.forEach((elem, index) => {
         if (index <= activeStepNum) {
            elem.classList.add("js-active");
         }
      });
   };

   //get active panel
   const getActivePanel = () => {
      let activePanel;

      DOMstrings.stepFormPanels.forEach((elem) => {
         if (elem.classList.contains("js-active")) {
            activePanel = elem;
         }
      });

      return activePanel;
   };

   //open active panel (and close unactive panels)
   const setActivePanel = (activePanelNum) => {
      //remove active class from all the panels
      removeClasses(DOMstrings.stepFormPanels, "js-active");

      //show active panel
      DOMstrings.stepFormPanels.forEach((elem, index) => {
         if (index === activePanelNum) {
            elem.classList.add("js-active");

            setFormHeight(elem);
         }
      });
   };

   //set form height equal to current panel height
   const formHeight = (activePanel) => {
      const activePanelHeight = activePanel.offsetHeight;

      DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;
   };

   const setFormHeight = () => {
      const activePanel = getActivePanel();

      formHeight(activePanel);
   };

   //STEPS BAR CLICK FUNCTION
   DOMstrings.stepsBar.addEventListener("click", (e) => {
      //check if click target is a step button
      const eventTarget = e.target;

      if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
         return;
      }

      //get active button step number
      const activeStep = getActiveStep(eventTarget);

      //set all steps before clicked (and clicked too) to active
      setActiveStep(activeStep);

      //open active panel
      setActivePanel(activeStep);
   });

   //PREV/NEXT BTNS CLICK
   $(".js-btn-next").on("click", function () {
      var wsbp_booking_date = $("#wsbp_booking_calender_date").val();
      var wsbp_num_of_person = $("#wsbp_num_of_person").val();
      var wsbp_booking_services = $("#wsbp_booking_services").val();
      if(wsbp_num_of_person && wsbp_booking_date && wsbp_booking_services){
         DOMstrings.stepsForm.addEventListener("click", (e) => {
            const eventTarget = e.target;
      
            //check if we clicked on `PREV` or NEXT` buttons
            if (
               !(
                  eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) ||
                  eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)
               )
            ) {
               return;
            }
      
            //find active panel
            const activePanel = findParent(
               eventTarget,
               `${DOMstrings.stepFormPanelClass}`
            );
      
            let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(
               activePanel
            );
      
            //set active step and active panel onclick
            if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
               activePanelNum--;
            } else {
               activePanelNum++;
            }
      
            setActiveStep(activePanelNum);
            setActivePanel(activePanelNum);
         });
      
      }else{
         $('#wsbp_booking_form_warning').show();
      }
   });
  
   
  
   //SETTING PROPER FORM HEIGHT ONLOAD
   window.addEventListener("load", setFormHeight, false);

   //SETTING PROPER FORM HEIGHT ONRESIZE
   window.addEventListener("resize", setFormHeight, false);

   //changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

   const setAnimationType = (newType) => {
      DOMstrings.stepFormPanels.forEach((elem) => {
         elem.dataset.animation = newType;
      });
   };

   //selector onchange - changing animation
   const animationSelect = document.querySelector(".pick-animation__select");

   //******************************************** */
   //                Booking Form
   //******************************************* */

   $("#wsbp_book_now").click(function (event) {
      alert("fahim");

      var wsbp_booking_first_name = $("#wsbp_booking_firstName").val();
      var wsbp_booking_lastName = $("#wsbp_booking_lastName").val();
      var wsbp_booking_email = $("#wsbp_booking_email").val();
      var wsbp_booking_phone = $("#wsbp_booking_phone").val();
      var wsbp_booking_address = $("#wsbp_booking_address").val();
      var wsbp_booking_date = $("#wsbp_booking_calender_date").val();
      var wsbp_num_of_person = $("#wsbp_num_of_person").val();
      var wsbp_booking_services = $("#wsbp_booking_services").val();
      var wsbp_booking_assistants = $(
         'input[name="wsbp_booking_assistance"]:checked'
      ).data("id");

      $.ajax({
         url:
            "http://localhost/salon/wp-json/wsbp/v1/bookinginfo/" +
            wsbp_booking_services,
         type: "GET",
         success: function (response) {
            var responseData = response;
            var wsbp_total_price = wsbp_num_of_person * responseData.price;
            var formData = {
               wsbp_booking_first_name: wsbp_booking_first_name,
               wsbp_booking_last_name: wsbp_booking_lastName,
               wsbp_booking_email: wsbp_booking_email,
               wsbp_booking_phone: wsbp_booking_phone,
               wsbp_booking_address: wsbp_booking_address,
               wsbp_booking_date: wsbp_booking_date,
               wsbp_booking_time: "8am",
               wsbp_booking_duration: responseData.duration,
               wsbp_booking_services: wsbp_booking_services,
               wsbp_booking_assistants: wsbp_booking_assistants,
               wsbp_num_of_person: wsbp_num_of_person,
               wsbp_booking_status: "pending",
               wsbp_booking_price: wsbp_total_price,
            };
            $.ajax({
               url: "http://localhost/salon/wp-json/wsbp/v1/createbookings",
               type: "POST",
               data: formData,
               success: function (response) {
                  console.log(response);
               },
               error: function (xhr, status, error) {
                  console.error(
                     "Request failed. Status: " + status + ", Error: " + error
                  );
               },
            });
         },
      });
   });

   //************************************************ */
   //               Avaible Avaiable Time
   //******************************************* ****/

   $("#wsbp_find_available_time").on("click", function () {
      var booking_time = $("#wsbp_booking_calender_date").val();

      var dateObj = new Date(booking_time);
      var year = dateObj.getFullYear();
      var month = ("0" + (dateObj.getMonth() + 1)).slice(-2);
      var day = ("0" + dateObj.getDate()).slice(-2);
      var formattedDate = year + "-" + month + "-" + day;
      alert(formattedDate);
      $.ajax({
         url: "http://localhost/salon/wp-json/wsbp/v1/booking/2023-04-21",
         type: "GET",
         success: function (response) {
            console.log(response);

            var htmlStrings = response.map((time) => {
               return `<td><div class="d-grid gap-2"><button class="btn btn-primary" type="button">${time}</button></div></td>`;
            });
            $("#wsbp_available_times_row").append(htmlStrings);
         },
      });
   });

   //************************************************ */
   //               Booking Info
   //******************************************* ****/
   $("#wsbp_booking_info").on("click", function () {
      var wsbp_booking_date = $("#wsbp_booking_calender_date").val();
      var wsbp_num_of_person = $("#wsbp_num_of_person").val();
      var wsbp_services_id = $("#wsbp_booking_services").val();
      $.ajax({
         url: "http://localhost/salon/wp-json/wsbp/v1/bookinginfo/"+wsbp_services_id,
         type: "GET",
         success: function (response) {
            var wsbp_total_price = wsbp_num_of_person * response.price;
            // Define the HTML to be appended
            var htmlStrings =
               '<div class="row"> \
            <div class="col-md-4"> \
               <img src="' +
               response.service_img +
               '" alt="Service Image"> \
            </div> \
            <div class="col-md-8"> \
               <h2 class="wsbp_booking_info_services_name">' +
               response.service_name +
               '</h2> \
               <p class="wsbp_booking_info_services_des">' +
               response.service_des +
               '</p> \
               <ul> \
                  <li class="wsbp_booking_info_services_date">Date: ' +
               wsbp_booking_date +
               '</li> \
                  <li class="wsbp_booking_info_services_duration">Duration: ' +
               response.duration +
               'Min</li> \
                  <li class="wsbp_booking_info_services_per">Persons: ' +
               wsbp_num_of_person +
               '</li> \
                  <li class="wsbp_booking_info_services_price">Price: $' +
               wsbp_total_price +
               "</li> \
               </ul> \
            </div> \
            </div>";

            $("#wsbp_booking_info_show").html(htmlStrings);
         },
      });
   });

     // Add event listener to Book button
     $(".wsbp_services_book_now").on("click", function () {
      // Get the ID of the selected service
      var serviceID = $(this).data('id');
      // Set the value of the select element to the ID of the selected service
      $("#wsbp_booking_services").val(serviceID);
   });


   

});
