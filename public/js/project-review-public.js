(function ($) {
	'use strict';

	$(window).load(function () {
		const pluginDirUrl = spprobj.siteUrl + '/wp-content/plugins/project-review/';

		$('#sppr-filter-network').multiSelect({
			'noneText': 'Filter by network',
		});

		$('#sppr-filter-risks').multiSelect({
			'noneText': 'Filter by risk',
		});

		$('#sppr-filter-container').css('opacity', '1');

		// Onclick 
		let projectData = {}
		const setProjectFeatureDesc = (projectId, context) => {
			return;
			// console.log('projectId, context :>> ', projectId, context);
			const target = document.getElementById('sppr-features-desc-' + projectId);
			if (target && context) {
				target.innerHTML = ''
				target.innerHTML = context
			}
		}
		const itemClick = (projectId) => {
			const target = document.getElementById('sppr-details-' + projectId);
			const icon = target.previousSibling.querySelector('.sppr-arrow');
			if (target.style.display === 'block') {
				target.style.display = 'none'
				if (icon) {
					icon.innerHTML = '<span class="iconify" data-icon="fe:arrow-right"></span>';
				}
				return;
			} else {
				if (icon) {
					icon.innerHTML = '<span class="iconify" data-icon="fe:arrow-down"></span>';
				}
			}
			const project = projectData.posts[projectId] || {}
			if (target && Object.keys(project).length) {
				console.log('projectData :>> ', project);
				target.setAttribute('style', 'display: block')
				let html = '';
				html += '<div class="sppr-details-wrapper">';
				html += '<div class="sppr-details-left">';

				if (project.feature_title !== '') {
					html += '<p class="sppr-details-title">' + project.feature_title + '</p>';
				}
				html += '<ul class="sppr-features">';
				const features = project.project_features || {};
				if (Object.keys(features).length) {
					for (let i = 0; i < Object.keys(features).length / 2; i++) {
						const li = document.createElement('LI');
						li.setAttribute('class', 'sppr-features-item');
						li.addEventListener('click', (e) => setProjectFeatureDesc(projectId, features['feature_' + (i + 1) + '_desc']));
						li.innerHTML = features['feature_' + (i + 1)]
						// html += li.innerHTML;
						html += '<li class="sppr-features-item" onClick="' +
							setProjectFeatureDesc(projectId, features['feature_' + (i + 1) + '_desc'])
							+ '">✅ ' + features['feature_' + (i + 1)] + '</li>';
					}
				}
				html += '</ul>';
				if (project.note !== '') {
					html += '<p class="sppr-details-note">' + project.note + '</p>';
				}
				if (project.alert !== '') {
					html += '<p class="sppr-details-alert">⚠️' + project.alert + '</p>';
				}
				if (project.post_date !== '') {
					html += '<p class="sppr-details-date">' + project.post_date + '</p>';
				}
				const buttons = project.action_buttons;
				html += '<div class="sppr-buttons">';
				if (buttons['button_1'] !== '') {
					html += '<a target="_blank" href="' + buttons['button_1_link'] + '">' + buttons['button_1'] + '</a>';
				}
				if (buttons['button_2'] !== '') {
					html += '<a target="_blank" href="' + buttons['button_2_link'] + '">' + buttons['button_2'] + '</a>';
				}
				if (buttons['button_3'] !== '') {
					html += '<a target="_blank" href="' + buttons['button_3_link'] + '">' + buttons['button_3'] + '</a>';
				}
				html += '<a target="_blank" href="' + project.permalink + '">More Info</a>';
				html += '</div>';

				html += '</div>';
				html += '<div class="sppr-details-right">';
				html += '<p id="sppr-features-desc-' + projectId + '"></p>';
				html += '</div>';
				html += '</div>';

				// container.innerHTML = html;
				target.innerHTML = html
				// target.append(container);
			}
			console.log('projectId :>> ', projectId);
		}
		// Filter Handler
		const filterHandler = (data, filter) => {
			// console.log('filter :>> ', filter);
			// console.log('data :>> ', data);
			let risks = data['risks'] || {};
			let networks = data['networks'] || {};
			let posts = data['posts'] || {};
			let filterPosts = Object.keys(posts).filter(key => {
				let post = posts[key];
				if (filter.networks.length < 1 && filter.risks.length < 1) {
					if (filter.audited.toLowerCase() !== 'audited' && filter.search === '') {
						return true;
					}
				}
				// Audited
				if (filter.audited.toLowerCase() === post.audited.toLowerCase()) {
					return true;
				}
				//search
				if (filter.search !== '' && post.post_title.toLowerCase().includes(filter.search.toLowerCase())) {
					return true;
				}
				// network
				if (filter.networks.length > 0 && filter.networks.indexOf(post.network) !== -1) {
					return true;
				}
				// risks
				if (filter.risks.length > 0 && filter.risks.indexOf(post.risks) !== -1) {
					return true;
				}
				return false;
			});

			let postsArray = Object.keys(data['posts']) || [];

			let projectsHtml = ''
			console.log(`filterPosts`, posts)
			if (filterPosts.length > 0) {
				projectsHtml = filterPosts.reverse().map((key) => {
					let html = '';
					const div = document.createElement('DIV');
					div.setAttribute('class', 'sppr-item-wrapper');
					div.setAttribute('data-id', key);
					div.addEventListener('click', (e) => itemClick(key));
					html += '<div class="sppr-item">';
					html += '<div class="sppr-title">';

					const top_buttons = posts[key]?.top_buttons;
					const post_interval = parseInt(posts[key]?.post_interval);
					html += '<div class="sppr-top-bar">';
					if (post_interval <= 1 && top_buttons['top_btn_1'] !== '') {
						html += '<span class="sppr-top-bar-btn sppr-new">' + top_buttons['top_btn_1'] + '</span>';
					}
					if (!!top_buttons['top_btn_2'] && top_buttons['top_btn_2'] !== '') {
						html += '<span class="sppr-top-bar-btn sppr-new2">' + top_buttons['top_btn_2'] + '</span>';
					}
					if (!!top_buttons['top_btn_3'] && top_buttons['top_btn_3'] !== '') {
						html += '<span class="sppr-top-bar-btn sppr-new3">' + top_buttons['top_btn_3'] + '</span>';
					}
					if (!!top_buttons['top_btn_4'] && top_buttons['top_btn_4'] !== '') {
						html += '<span class="sppr-top-bar-btn sppr-new4">' + top_buttons['top_btn_4'] + '</span>';
					}
					html += '</div>';
					html += '<div class="sppr-name">' + posts[key]['post_title'] + '</div>';
					html += '</div>';
					html += '<div class="sppr-button"><span class="sppr-risks sppr-risks-' + posts[key]['risks'] + '">' + risks[posts[key]['risks']] + '</span></div>';
					html += '<div class="sppr-network"><span class="sppr-network sppr-network-' + posts[key]['network'] + '"><img src="' + pluginDirUrl + 'public/icons/network/' + networks[posts[key]['network']].replace(/\s+/g, '').toLowerCase() + '.svg" alt="" class="network-logo"></span></div>';
					html += '<div class="sppr-arrow"><span class="iconify" data-icon="fe:arrow-down"></span></div>';
					html += '<div class="sppr-site"><a href="' + posts[key]['action_buttons']['button_1_link'] + '">Visit Website &nbsp;<span class="iconify" data-icon="fa-solid:external-link-alt"></span></a></div>';
					html += '</div>';
					// html += '<div class="sppr-more-view sppr-arrow"><span class="iconify" data-icon="fe:arrow-right"></span></div>';
					html += '<div id="sppr-details-' + key + '" class="sppr-details"></div>';
					div.innerHTML = html;
					return div;
				});
			}
			// console.log(`projectsHtml`, projectsHtml)

			$("#sppr-items").html(projectsHtml);

		}


		// Get data
		const getFilterData = (data) => {
			let networks = [];
			let risks = [];
			let audited = false;
			let search = '';
			let filter = [];
			$("#sppr-filter-network option:selected").each(function () {
				networks.push($(this).val());
			});
			$("#sppr-filter-risks option:selected").each(function () {
				risks.push($(this).val());
			});
			audited = $('#sppr-filter-audited').is(":checked") ? "Audited" : "Not Audited";
			search = $("#sppr-search").val();
			filter['networks'] = networks;
			filter['risks'] = risks;
			filter['audited'] = audited;
			filter['search'] = search;

			return filterHandler(data, filter);
		}


		// Set Event Handler
		function setEventWithData(data) {
			$(".sppr-filter-container select").change(function (e) {
				getFilterData(data);
			}).trigger("change");

			$(".sppr-filter-container input").change(function (e) {
				getFilterData(data);
			}).trigger("change");

			$("#sppr-search").on('input', function (e) {
				getFilterData(data);
			});
		}




		// Fetch data
		$.getJSON(spprobj.siteUrl + '/wp-json/sppr/v1/projects/list', {}, function (data, textStatus, jqXHR) {
			// console.log('data :>> ', data);
			projectData = data;
			console.log(`data`, data)
			setEventWithData(data);
		})
			.done(function () { })
			.fail(function (jqxhr, settings, ex) { });

	});


})(jQuery);