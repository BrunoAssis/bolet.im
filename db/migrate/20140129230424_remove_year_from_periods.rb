class RemoveYearFromPeriods < ActiveRecord::Migration
  def change
    remove_reference :periods, :year, index: true
  end
end
