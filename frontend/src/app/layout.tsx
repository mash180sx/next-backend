// import './globals.css'
import './globals.css'
import type { Metadata } from 'next'
import { Inter } from 'next/font/google'

const inter = Inter({ subsets: ['latin'] })

export const metadata: Metadata = {
  title: 'Create Next App',
  description: 'Generated by create next app',
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="ja" className={inter.className}>
      <body className="block w-full h-full fixed">
        <header className="w-full h-8 bg-pink-300 overflow-x-hidden overflow-y-scroll fixed">
          Header
        </header>
        <div className="mt-8 bg-yellow-300 w-full min-h-screen flex fixed">
          <div className="w-80 min-h-screen bg-purple-700 block overflow-y-hidden">
            Left
          </div>
          <div className="w-full min-h-screen bg-gray-400 overflow-x-hidden overflow-y-scroll">
            {children}
          </div>
        </div>
      </body>
    </html>
  )
}
