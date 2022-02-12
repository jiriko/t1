#BookingController
Don't like:
1. Not a fan of the repository pattern.
2. BookingController@index method:
   * It looks like it's doing too much. I would separate the super admin route vs normal user routes. Add a policy/validation.
   * The elseif is useless and can just return early. Would probably create a resource or even just a base response to make it standard.
   * The __authenticatedUser is weird. The Illuminate\Http\Request already has the user() method.
3. BookingRepository@__construct
   * The logger class should be injected so it's testable. Also maybe make a wrapper for the methods so new developers can easily use it.
4. BookingRepository@getUsersJobs
   * Lack of enum like usertype
   * no pagination - well not scale well
   * if else is usually a sign that it needs a new method or class.
   * Deep nesting if+foreach+if. Extract or probably just use collection methods
   * Job::checkParticularJob - n+1
   * Should have let the database do more of the filtering etc.. 
    * Would probably create a FindJobAction for $user
   * It would be easier if the frontend is component based and has a better api to work with. This code is a nightmare to update.
5. Not PSR
   * Variable names sometimes doesn't make sense
   * Some variables not in camelcase
   * spelling  
   * array() vs []
   * not consistent
   
   
   

   