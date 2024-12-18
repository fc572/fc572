function arrangeAndDisplay(map, bikeGeoLocationAndName) {
  let countTubeNorth = 0,
    countTubeSouth = 0,
    countBikesNorth = 0,
    countBikesSouth = 0;

  const bikeNorth = {
    background: '#1D13EC',
    borderColor: '#000000',
    glyphColor: '#FFFFFF',
    glyph: 'Bn'
  };

  const bikeSouth = {
    background: '#34BE07',
    borderColor: '#000000',
    glyphColor: '#FFFFFF',
    glyph: 'Bs'
  };

  const tubeNorth = {
    background: '#2292E9',
    borderColor: '#000000',
    glyphColor: '#FFFFFF',
    glyph: 'Tn'
  };

  const tubeSouth = {
    background: '#D4FD9D',
    borderColor: '#000000',
    glyphColor: '#FFFFFF',
    glyph: 'Ts'
  };

  bikeGeoLocationAndName.forEach(location => {
    let flag = false;
    let iconPin, markerType;

    for (let j = 0; j < riverThamesCoordinates.length - 1; j++) {
      if ((location[2] >= riverThamesCoordinates[j].lng) &&
        (location[2] <= riverThamesCoordinates[j + 1].lng)) {
        if (riverThamesCoordinates[j].lat >= location[1]) {
          flag = true;
          break;
        }
      }
    }

    if (flag) {
      if (location[3] === 'B') {
        iconPin = bikeSouth;
        countBikesSouth++;
        markerType = 'bike';
      } else {
        iconPin = tubeSouth;
        countTubeSouth++;
        markerType = 'tube';
      }
    } else {
      if (location[3] === 'B') {
        iconPin = bikeNorth;
        countBikesNorth++;
        markerType = 'bike';
      } else {
        iconPin = tubeNorth;
        countTubeNorth++;
        markerType = 'tube';
      }
    }
    new google.maps.marker.AdvancedMarkerElement({
      position: { lat: location[1], lng: location[2] },
      map: map,
      content: new google.maps.marker.PinElement(iconPin).element
    });
  });

  console.log("countBikesSouth",countBikesSouth)
  console.log("countTubeNorth",countTubeNorth)

  map.countBikesNorth = countBikesNorth;
  map.countTubeNorth = countTubeNorth;
  map.countBikesSouth = countBikesSouth;
  map.countTubeSouth = countTubeSouth;

  var legend = document.getElementById('legend');
  var div = document.createElement('div');
  div.innerHTML = "<img src=\"http://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=Bn|1D13EC|000000\">  Bikes North of river " + map.countBikesNorth + "<br/>";
  div.innerHTML += "<img src=\"http://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=T|2292E9|000000\">  Tube North of river " + map.countTubeNorth + "<br/>";
  div.innerHTML += "<img src=\"http://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=Bs|34BE07|000000\">  Bikes South of river " + map.countBikesSouth + "<br/>";
  div.innerHTML += "<img src=\"http://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=Ts|D4FD9D|000000\">  Tube South of river " + map.countTubeSouth;
  legend.appendChild(div);
  document.getElementById("countnorth").innerHTML = map.countTubeNorth + map.countBikesNorth;
  document.getElementById("countsouth").innerHTML = map.countTubeSouth + map.countBikesSouth;
  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
    document.getElementById('legend'));

  return map;
}