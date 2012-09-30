      
        
        var d_names = new Array("Sunday", "Monday", "Tuesday",
        "Wednesday", "Thursday", "Friday", "Saturday");
        
        var m_names = new Array("January", "February", "March", 
        "April", "May", "June", "July", "August", "September", 
        "October", "November", "December");
        
        var d = new Date();
        var curr_day = d.getDay();
        var curr_date = d.getDate();
        var sup = "";
        if (curr_date == 1 || curr_date == 21 || curr_date ==31)
           {
           sup = "st";
           }
        else if (curr_date == 2 || curr_date == 22)
           {
           sup = "nd";
           }
        else if (curr_date == 3 || curr_date == 23)
           {
           sup = "rd";
           }
        else
           {
           sup = "th";
           }
        var curr_month = d.getMonth();
        var curr_year = d.getFullYear();
      
        document.write(d_names[curr_day] + " " + curr_date + "<SUP>"
        + sup + "</SUP> " + m_names[curr_month] + " " + curr_year);
        
        
        var a_p = "";
        var d = new Date();
        
        var curr_hour = d.getHours();
        
        if (curr_hour < 12)
           {
           a_p = "AM";
           }
        else
           {
           a_p = "PM";
           }
        if (curr_hour == 0)
           {
           curr_hour = 12;
           }
        if (curr_hour > 12)
           {
           curr_hour = curr_hour - 12;
           }
        
        var curr_min = d.getMinutes();
         document.write('&nbsp; &nbsp; ');
        document.write(curr_hour + " : " + curr_min + " " + a_p);
        //-->

