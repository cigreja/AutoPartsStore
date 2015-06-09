



var e = document.getElementById('year').value; e.value = '1984';

// yearDropList
                  var yearDropList = "<select onchange=\"this.form.submit()\" id=\"year\">";
                  yearDropList += "<option value=\"null\"> - Select Year - </option>";

                    for (var i = 1984; i < 2015; i++) {
                      yearDropList += "<option value=\"" + i + "\">" + i + "</option>";
                    }
                    yearDropList += "</select>";
                    document.write(yearDropList);
            
            //modelDropList
            var e = document.getElementById("year");
            var y = e.options[e.selectedIndex].text;
            
            var modelDropList = "<select name=\"model\">";
            modelDropList += "<option value=\"null\"> - Select Model - </option>";
            if(y < 1991){
               var models = ["3 Series","5 Series","7 Series"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
            }
            if(y > 1990 && y < 1995 ){
               var models = ["3 Series","5 Series","7 Series","8 Series"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
            }
            if(y === 1995 ){
               var models = ["3 Series","318ti","5 Series","7 Series","8 Series"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
            }
            if(y === 1996 ){
               var models = ["3 Series","318ti","7 Series","8 Series","Z3/M, ROADSTER/COUPE"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
            }
            if(y === 1997 ){
               var models = ["3 Series","318ti","5 Series","7 Series","8 Series","Z3/M, ROADSTER/COUPE"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
            }
            if(y === 1998 ){
               var models = ["3 Series","318ti","5 Series","7 Series","Z3/M, ROADSTER/COUPE"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y === 1999 ){
               var models = ["3 Series Sedan/Wagon","3 Series","318ti","5 Series","7 Series","Z3/M, ROADSTER/COUPE"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
            }
            if(y > 1999 && y < 2003 ){
               var models = ["3 Series Coupe/Convertible","3 Series Sedan/Wagon","5 Series","7 Series","X5","Z3/M, ROADSTER/COUPE","Z8"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y === 2003 ){
               var models = ["3 Series Coupe/Convertible","3 Series Sedan/Wagon","5 Series","7 Series","X5","Z4","Z8"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y > 2003 && y < 2008 ){
               var models = ["3 Series Coupe/Convertible","3 Series Sedan/Wagon","5 Series","6 Series","7 Series","X3","X5","Z4"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y > 2007 && y < 2010 ){
               var models = ["1 Series","3 Series Coupe/Convertible","3 Series Sedan/Wagon","5 Series","6 Series","7 Series","X3","X5","X6","Z4"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y === 2010 ){
               var models = ["1 Series","3 Series Coupe/Convertible","3 Series Sedan/Wagon","5 Series GT","5 Series","6 Series","7 Series","X3","X5","X6 Hybrid","X6","Z4"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y === 2011 ){
               var models = ["1 Series","3 Series Coupe/Convertible","3 Series Sedan/Wagon","5 Series GT","5 Series","7 Series Hybrid","7 Series","X3","X5","X6 Hybrid","X6","Z4"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y === 2012 ){
               var models = ["1 Series","3 Series Coupe/Convertible","3 Series Sedan","3 Series Wagon","5 Series GT","5 Series","6 Series","7 Series Hybrid","7 Series","X3","X5","X6","Z4"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y === 2013 ){
               var models = ["1 Series","3 Series Coupe/Convertible","3 Series Sedan/Wagon","5 Series GT","5 Series","6 Series","7 Series Hybrid","7 Series","X1","X3","X5","X6","Z4"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
           }
            if(y === 2014 ){
               var models = ["1 Series","3 Series Sedan/Wagon","5 Series GT","5 Series","7 Series Hybrid","7 Series","X1"];
               for(var i = 0; i < models.length; i++){
                   modelDropList += "<option value=\"" + models[i] + "\">" + models[i] + "</option>";
               }
            }
        modelDropList += "</select>";
        document.write(modelDropList);
        
        
        //partsDropList
           var partDropList = "<select name=\"part\">";
           partDropList += "<option value=\"null\"> - Select Part - </option>";
           var parts = ["A/C & Heater","Alternator/Starter","Axle/Brakes","Body Hardware/Trim","Cooling System","Electrical/Sensors", "Emission/Exhaust","Engine/Transmission","Fuel System","Suspension/Steering"];
           for(var i = 0; i < parts.length; i++){
               partDropList += "<option value=\"" + parts[i] + "\">" + parts[i] + "</option>";
           }
           partDropList += "</select>";
           document.write(partDropList);
       

