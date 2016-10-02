
// = require jquery-ui.min.js

// = require jquery.caret.min.js
// = require jquery.tag-editor.min.js

// = require alertify.js

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
	var Tags = new (function () {
		var self = this;
		var storage = [];
		var updated = true;

		this.fetch = function () {
			return (new Promise(function (resolve, reject) {
				if (updated)
					$.getJSON('/tags')
						.success(function (data) {
							updated = false;
							// cache
							storage = [];
							for (var i in data)
								self.put(data[i]);

							last = +new Date;
							resolve(data);
						})
						.error(reject);
					else
						resolve(storage);
			}));
		};

		this.put = function (data) {
			storage[~~+(data['id'])] = data;
		}

		this.get = function (name) {
			let ids = Object.keys(storage).map(Number);
			for (var tag, i = 0; i < ids.length; i++) {
				if ((tag = storage[ids[i]])['name'] === name)
					return tag;
			}
		};

		this.save = function (name) {
			return (new Promise(function (resolve, reject) {
				$.post('/tags', {'name': name}, 'json')
					.success(function (data) {
						updated = true;
						self.put(data);
						resolve(data);
					})
					.error(reject);
			}))
		};
	})();

	$('#tags-input').tagEditor({
		autocomplete: {
			delay: 100,
			position: { collision: 'flip' },
			source: function (request, response) {
				Tags.fetch()
					.then(function (tags) {
						var term = request.term;
						var names = tags.map(function (json) {
							return json['name'];
						});

						response(names.filter(function (name) {
							return name.indexOf(term) >= 0;
						}));
					}).catch(function (error) {
						alertify.error('Failed to load tags.');
					});
			},
		},
		beforeTagSave: function(field, editor, tags, tag, val) {
			if (Tags.get(val))
				return;

			var removeTag = function () {
				$('#tags-input')
					.tagEditor('editTag', val);
			};

			alertify.confirm('Create tag "' + val + '"?', function (ok) {
				if (ok)
					Tags.save(val)
						.catch(function (error) {
							removeTag();
							alertify.error('Failed to save tag.');
						});
				else
					removeTag();
			});
		},
	});

});
