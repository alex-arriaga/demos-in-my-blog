function sortByTitleNotConsistentASC(itemA, itemB) {
    var valueA = itemA.title;
    var valueB = itemB.title;

	var a = valueA.trim().toLowerCase();
	var b = valueB.trim().toLowerCase();
	var r = ((a > b) ? 1 : ((a < b) ? -1 : 0));
    return r;
}

function sortByTitleConsistentASC(itemA, itemB) {
	var valueA = itemA.title;
	var valueB = itemB.title;

	var a = valueA.trim().toLowerCase();
	var b = valueB.trim().toLowerCase();
	var r = ((a > b) ? 1 : ((a < b) ? -1 : 0));
	if(r === 0){
		r = (typeof itemA.key !== 'undefined' && typeof itemB.key !== 'undefined')?
			itemA.key - itemB.key : 0;
	}
    return r;
}

function sortByDateConsistentASC(itemA, itemB) {
	var valueA = itemA.date;
	var valueB = itemB.date;

	// 1. Adding parsing of strings to Date
	// Using moment.js, get last version of it from: http://momentjs.com/
	// Please be sure about using a valid ISO 8601 format:
	// "Deprecation warning: moment construction falls back to js Date.
	// This is discouraged and will be removed in upcoming major release. Please refer to https://github.com/moment/moment/issues/1407 for more info."
	var a = moment(valueA);
	var b = moment(valueB);
	var r = 0;

	// 2. Comparing two Dates (have to be valid dates)
	if (a.isValid() && b.isValid()) {
		r = ((a.valueOf() > b.valueOf()) ? 1 : ((a.valueOf() < b.valueOf()) ? -1 : 0));
	}

	// 3. In case of dates are equal apply same logic with the unique key to provide the stable sorting
	if(r === 0){
		r = (typeof itemA.key !== 'undefined' && typeof itemB.key !== 'undefined')?
			itemA.key - itemB.key : 0;
	}
    return r;
}