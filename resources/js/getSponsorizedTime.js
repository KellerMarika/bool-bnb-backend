import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import axios from 'axios';
import.meta.glob([
 '../img/**'
]);

/* FETCH SPONSORIZED TIME FOR A SINGLE APARTMENT ***********************************************************/

/* HTML ELEMNTENTS */
const expirationDate_element = document.getElementById("expiration-date")
const SubContainer_element = document.getElementById("sub-infos-container")
const SubBg_element = document.getElementById("subscription-bg-container")
const SubTitle_element = document.getElementById("subscription-title")
const activeSub_elements = document.querySelectorAll('.subscription-true')
const bunnerTitle_element = document.getElementById('bunner-sponsor-title')

const pathArray = window.location.pathname.split('/');
let apartmentId
let apartment
let apartmentSubInfos

let expDateTime
let currentDateTime = new Date().getTime();
const oneDayTime = 86400000

pathArray.forEach((word, index) => {
 if (word === "apartments" && !isNaN(pathArray[index + 1])) {
  apartmentId = pathArray[index + 1]
 }
});
/* console.log(apartmentId); */

axios
 .get(`http://127.0.0.1:8000/api/apartments/${apartmentId}`)
 .then((resp) => {
  apartment = resp.data
  console.log(apartment);
  apartmentSubInfos = getSponsorizedFrame()
  console.log(apartmentSubInfos)

  expDateTime = new Date(apartmentSubInfos.expiration_date).getTime();
  let expAdvise = new Date(apartmentSubInfos.expiration_date)
  const offsetMs = expAdvise.getTimezoneOffset() * 60 * 1000;
  const dateLocal = new Date(expAdvise.getTime() - offsetMs);
  expAdvise = dateLocal.toISOString().slice(0, 19).replace(/-/g, "/").replace("T", " ");


  if (apartmentSubInfos.isActive === false) {
   activeSub_elements.forEach(element => {
    element.classList.toggle("d-none", true)

    SubContainer_element.classList.toggle("bg-transparent", true);
    SubBg_element.classList.toggle("border-dark", true);
    SubContainer_element.classList.toggle("text-dark", true);
    SubTitle_element.innerHTML = "Non hai promozioni attive!"
    bunnerTitle_element.innerHTML = "Sponsorizza il tuo appartamento!"
   });
  } else {
   bunnerTitle_element.innerHTML = "Prolunga la tua Sponsorizzazione per questo appartamento!"
   /*    console.log(expDateTime)
      console.log(currentDateTime)
      console.log(expDateTime-currentDateTime)
      console.log(oneDayTime)
      console.log(oneDayTime*2) */
   console.log((expDateTime - currentDateTime) > oneDayTime)

   //se è maggiore di 1 giorno
   if ((expDateTime - currentDateTime) <= oneDayTime) {
    console.log("durata <= 1day")
    SubContainer_element.classList.toggle("bg-silver", true);
    SubTitle_element.innerHTML = 'SILVER <i class="fa-regular fa-star d-block pt-3" style="transform:scale(150%)"></i>'

   } else if ((expDateTime - currentDateTime) <= oneDayTime * 3) {
    console.log("durata < 3day")
    SubContainer_element.classList.toggle("bg-gold", true);
    SubTitle_element.innerHTML = ' <i class="fa-regular fa-sun"></i>'

   } else if ((expDateTime - currentDateTime) > oneDayTime * 3) {
    console.log("durata > 3day")
    SubContainer_element.classList.toggle("bg-diamond", true);
    SubTitle_element.innerHTML = '<i class="fa-regular fa-gem"></i>'
   } 

   SubBg_element.classList.toggle("border", false);
   SubContainer_element.classList.toggle("text-dark", true);

   expirationDate_element.innerHTML = expAdvise
   /* expirationDate_element.innerHTML = expAdvise
   expirationDate_element.innerHTML = expAdvise */

  }


  if (resp.data === 'error') {
   this.$router.push('http://localhost:5173/error');
  }

 });




function fromDateToMillisecond(data) {
 return new Date(data).getTime()
}
/* SUBSCRIPTION */
function getSponsorizedFrame() {

 let duration = 0;
 let currentDate = new Date().getTime();

 //devo ritornare subInfos
 let subInfos = {
  isActive: false,
  expiration_date: null
 }
 //se è stato sponsorizzato almeno una volta
 if (apartment.subscriptions.length > 0) {
  console.log("ALL apartment sub", apartment.subscriptions)

  //se ha solo una sponsorizzazione:
  if (apartment.subscriptions.length === 1) {
   duration = new Date(apartment.subscriptions[0].pivot.expiration_date).getTime()

   if (duration > currentDate) {
    subInfos.isActive = true,
     subInfos.expiration_date = new Date(duration);
    return subInfos
   } else {
    return subInfos
   }
  } else {

   for (let index = apartment.subscriptions.length - 1; index >= 0; index--) {
    const subscription = apartment.subscriptions[index];
    if (index === apartment.subscriptions.length - 1) {
      
     console.log(this.fromDateToMillisecond(subscription.pivot.created_at)) ;
     let startSubscription = this.fromDateToMillisecond(subscription.pivot.created_at);
     let endSubscription = this.fromDateToMillisecond(subscription.pivot.expiration_date);
     duration = endSubscription - startSubscription;
     duration = recursiveControl(index, apartment, duration);//ritorna 
     if (duration > currentDate) {
      subInfos.isActive = true,
       subInfos.expiration_date = new Date(duration);
      return subInfos
     }
     return subInfos
    }
    function recursiveControl(index, apartment, duration) {
     const currentSubscription = apartment.subscriptions[index];
     const prevSubscription = apartment.subscriptions[index - 1];
     const currentStartDate = new Date(currentSubscription.pivot.created_at).getTime();
     const prevEndDate = new Date(prevSubscription.pivot.expiration_date).getTime();

     console.log(currentStartDate < prevEndDate);
     if (currentStartDate < prevEndDate) {

      duration += prevEndDate - currentStartDate;
      if (index - 1 > 0) {
       return recursiveControl(index - 1, apartment, duration);
      } else {
       let lastSubCeationDate = new Date(prevSubscription.pivot.created_at).getTime()
       duration += lastSubCeationDate
       return duration
      }
     } else {
      duration += currentStartDate
      return duration
     }
    }
   }
  }
 } else {
  console.log(subInfos)
  return subInfos
 }
}
