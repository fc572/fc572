let map;

 async function initMap() {
   // Request needed libraries.
   //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

      var map;
      var london = {
        lat: 51.5334,
        lng: -0.2089
      };
      map = new google.maps.Map(document.getElementById('map'), {
        center: london,
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapId: "TFL_MAP"
      });
      var bikeGeoLocationAndName = [];
      getApiRequest("https://api.tfl.gov.uk/BikePoint", function locationApi(response) {
        for (var i = 0; i < response.length; i++) {
          bikeGeoLocationAndName[i] = [];
          bikeGeoLocationAndName[i][0] = response[i].commonName;
          bikeGeoLocationAndName[i][1] = response[i].lat; 
          bikeGeoLocationAndName[i][2] = response[i].lon;
          bikeGeoLocationAndName[i][3] = 'B';
        }
        var tubeGeoLocationAndName = tubeCoordinates();
        bikeGeoLocationAndName.push.apply(bikeGeoLocationAndName, tubeGeoLocationAndName);
        bikeGeoLocationAndName.sort(function (a, b) {
          return a[0] == (b[0]);
        });
        map = arrangeAndDisplay(map, bikeGeoLocationAndName);
      });
  };
        initMap();