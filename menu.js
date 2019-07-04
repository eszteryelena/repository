function highlightCurrent() {
// this will use a function to highlight the current page
//const defines a constant reference to a value in this case the current page
//which is equal to the document.URL,
//document.getElementsbytagname this returns an HTMLCollection of elements with the given tag name
//in this case that is 'a'/ the a href link
//then if this matches the curPage then the link is added as 'current'

         const curPage = document.URL;
         const links = document.getElementsByTagName('a');
         for (let link of links) {
           if (link.href == curPage) {
             link.classList.add("current");
           }
         }
       }


//when the curPage  changes, a readystatechange event fires on the document object.
//and this is felected back to highlight current
       document.onreadystatechange = () => {
         if (document.readyState === 'complete') {
           highlightCurrent()
         }
       };