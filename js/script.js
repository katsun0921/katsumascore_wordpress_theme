(function() {
  var didDone = false;
  function done() {
    if(!didDone) {
      didDone = true;
      document.querySelector("#page-loader-pro").classList.add('finished-loading');
      document.querySelector("#js-preloader").classList.add('progression-preloader-completed');
    }
  }
  var loaded = false;
  var minDone = false;
  //The minimum timeout.
  setTimeout(function(){
    minDone = true;
    //If loaded, fire the done callback.
    if(loaded) { done(); }
  }, 400);
  //The maximum timeout.
  setTimeout(function(){ done(); }, 2000);
  //Bind the load listener.
  window.addEventListener('load', function() {
    loaded = true;
    if(minDone) { done(); }
  });
})();

