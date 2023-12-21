var btnXlsx = document.querySelectorAll('.action button')[0]
var btnXls = document.querySelectorAll('.action button')[1]
var btnCsv = document.querySelectorAll('.action button')[2]

btnXlsx.onclick = () => exportData('xlsx')
btnXls.onclick = () => exportData('xls')
btnCsv.onclick = () => exportData('csv')

function exportData(type){
    const fileName = 'exported-sheet.' + type
    const table = document.getElementById("table")
    const wb = XLSX.utils.table_to_book(table)
    XLSX.writeFile(wb, fileName)
}