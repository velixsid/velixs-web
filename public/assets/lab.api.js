document.querySelectorAll('.response-ui').forEach((e)=>{
    e.textContent = JSON.stringify(JSON.parse(e.dataset.response), null , 2)
    hljs.highlightBlock(e);
})

document.querySelectorAll('.btn-endpoint').forEach((btns)=>{
    btns.addEventListener('click', (btn)=>{
        const parentDiv = btns.closest('[data-tab]');
        parentDiv.querySelectorAll('.btn-endpoint').forEach((btn) => {
            btn.disabled = true
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 animate-spin" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3a9 9 0 1 0 9 9"></path></svg>Test Endpoint';
        })

        const url = parentDiv.querySelector('input[name="url"]').value
        const data = parentDiv.querySelector('input[name="data-body"]').value
        const method = parentDiv.querySelector('input[name="method"]').value
        let rui = parentDiv.querySelector('.response-ui')
        const rscode= parentDiv.querySelector('.response-status-code')
        axios({
            method,
            url,
            data : JSON.parse(data)
        }).then((res)=>{
            setTimeout(() => {
                parentDiv.querySelectorAll('.btn-endpoint').forEach((btn) => {
                    btn.disabled = false
                    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M21 7l-18 0"></path><path d="M18 10l3 -3l-3 -3"></path><path d="M6 20l-3 -3l3 -3"></path><path d="M3 17l18 0"></path></svg>Test Endpoint'
                })
            }, 3000);
            rui.textContent = JSON.stringify(res.data ?? {}, null , 2)
            rscode.setHTML('<span class="text-green-600">'+res.status+'</span>')
            hljs.highlightBlock(rui);
        }).catch((err)=>{
            setTimeout(() => {
                parentDiv.querySelectorAll('.btn-endpoint').forEach((btn) => {
                    btn.disabled = false
                    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M21 7l-18 0"></path><path d="M18 10l3 -3l-3 -3"></path><path d="M6 20l-3 -3l3 -3"></path><path d="M3 17l18 0"></path></svg>Test Endpoint'
                })
            }, 3000);
            rui.textContent = JSON.stringify(err.response.data ?? {}, null , 2)
            rscode.setHTML('<span class="text-red-600">'+err.response.status+'</span>')
            hljs.highlightBlock(rui);
        })
    })
})
