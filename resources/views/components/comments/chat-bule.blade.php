<div class="flex w-full flex-col gap-4">
    <!-- Recieved -->
    <div class="mr-auto flex max-w-[80%] flex-col gap-2 rounded-r-xl rounded-tl-xl bg-slate-100 p-4 text-black md:max-w-[60%] ">
        <span class="font-semibold">Metanoïa</span>
        <div class="text-sm text-slate-700 dark:text-slate-300">
            Message ajouté par la FI Metanoïa
        </div>
        <span class="ml-auto text-xs">{{ now()->subMinutes(7)->format('h:i A') }}</span>
    </div>

    <!-- Sent -->
    <div class="ml-auto flex max-w-[80%] flex-col gap-2 rounded-l-xl rounded-tr-xl bg-slate-700 p-4 text-sm text-slate-100 md:max-w-[60%] ">
        Message envoyé par Ruth
        <span class="ml-auto text-xs">{{ now()->subMinutes(5)->format('h:i A') }}</span>
    </div>

    <!-- Recieved -->
    <div class="mr-auto flex max-w-[80%] flex-col gap-2 rounded-r-xl rounded-tl-xl bg-slate-100 p-4 text-black md:max-w-[60%] ">
        <span class="font-semibold">Koinonia</span>
        <div class="text-sm text-slate-700 dark:text-slate-300">
           Message ajouté par la FI Koinonia
        </div>
        <span class="ml-auto text-xs">{{ now()->format('h:i A') }}</span>
    </div>
</div>
