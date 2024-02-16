(() => {				
		const DOMString = `		
			<div class=" popup-alert-div ">
				<div class="popup-alert">
					<b class="popup-alert-header" target="_blank">
						<b 						 
						style="color:#297baa;font-family: Tahoma, Verdana, sans-serif;  ">
						CROSS POINT 
						</b>
						<b 						 
						style="font-family: Tahoma, Verdana, sans-serif;color:rgba(229,231,32,255)"> 
						CARE DIAGNOSTIC
						</b>
					</b>				
					<img  src="Admin/script/flex.png">			
					<a href="https://forms.gle/216o4eQ2kSzw5Jwa9 " class="popup-alert-btn submit">BOOK NOW</a>
					<a href="#" class="popup-alert-btn close">SKIP NOW</a>
					
				</div>
			</div>
						`						
		const createLinkElementAndAppendInHead = (path) => {
		const element = document.createElement('link');
		element.href = `${path}`;
		element.rel = 'stylesheet';
		document.head.append(element);
		}									
		createLinkElementAndAppendInHead('Admin/script/script.css ');
		document.body.insertAdjacentHTML('afterbegin', DOMString)				
		const btnOk = document.querySelector('.close');
		btnOk.addEventListener('click', (e) => {
			e.target.closest('.popup-alert-div').remove();
		});				
		})();
		
        