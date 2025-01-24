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

  map.countTotal = countBikesNorth + countTubeNorth + countBikesSouth + countTubeSouth;
  map.countTotalBikes = countBikesNorth + countBikesSouth
  map.countTotalTubes = countTubeNorth + countTubeSouth

  map.countBikesNorth = countBikesNorth;
  map.countTubeNorth = countTubeNorth;
  map.countBikesSouth = countBikesSouth;
  map.countTubeSouth = countTubeSouth;

  document.getElementById("countTotal").innerHTML = map.countTotal;
  document.getElementById("countTotalBikes").innerHTML = map.countTotalBikes;
  document.getElementById("countTotalTubes").innerHTML = map.countTotalTubes;

  document.getElementById("countNorth").innerHTML = map.countTubeNorth + map.countBikesNorth;
  document.getElementById("countSouth").innerHTML = map.countTubeSouth + map.countBikesSouth;

  document.getElementById("bikeNorth").innerHTML = countBikesNorth;
  document.getElementById("bikeSouth").innerHTML = countBikesSouth;

  document.getElementById("tubeNorth").innerHTML = countTubeNorth;
  document.getElementById("tubeSouth").innerHTML = countTubeSouth;

  return map;
}